<?php

class Model
{
    public static $conn = '';
    public array $totalMenu = array();

    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'digi_mvc';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"');
        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $this->conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
//        $this->conn= new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "utf8"'));
        if (function_exists('jdate') == false) {
            require('public/jdf/jdf.php');
        }
    }

    public static function getOptions()
    {
        $sql = 'select * from tbl_option';
        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $options = $stmt->fetchAll();
        $options_new = array();
        foreach ($options as $option) {
            $setting = $option['setting'];
            $value = $option['value'];
            $options_new[$setting] = $value;
        }
        return $options_new;

    }

    function calculateDiscount($price, $discount)
    {
        $price_discount = ($discount * $price) / 100;
        $price_total = $price - $price_discount;
        return array($price_discount, $price_total);
    }

    function doSelect($sql, $values =array(), $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

    function doQuery($sql, $values = array())
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
    }

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {
        $new_height = $h;
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }
//        $file_name = 'thumb_' . basename($file); /* Name Of The Image File */
//        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $what = getimagesize($file);
        $src = '';
        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);
                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default;
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight); //The New Image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); //Az Function
        imagejpeg($dst, $pathToSave, 95); //pish farz in tabe 75 darsad quality ast
//        imagejpeg($dst,$pathToSave.$file_name,95); //pish farz in tabe 75 darsad quality ast
        return $dst;
    }

    public static function sessionInit()
    {
        @session_start();
    }

    public static function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return FALSE;
        }
    }

    public static function getBasketCookie()
    {
        if (isset($_COOKIE['basket'])) {
//            $cookie = json_decode($_COOKIE['basket'], true);
            $cookie = $_COOKIE['basket'];
        } else {
            $value = time();
//            $value=time()+rand(100,100000);
            $expireTime = time() + (3600 * 24);
            setcookie('basket', $value, $expireTime, "/");
            $cookie = $value;
//            setcookie('basket', json_encode($value),$expireTime);
//            $cookie = json_decode($_COOKIE['basket'], true);
        }
        return $cookie;
    }

    function getBasket()
    {
        $sql = 'select b.tedad,b.id as basketRow,p.*,c.title as colorTitle,g.title as guaranteeTitle 
        from tbl_basket b
        LEFT JOIN  tbl_product p ON b.idproduct=p.id
        LEFT JOIN tbl_color c ON b.color=c.id
        LEFT JOIN tbl_guarantee g ON b.guarantee=g.id
        where cookie=?';
//        $sql='select tbl_basket.tedad,tbl_basket.id as basketRow,tbl_product.* from tbl_basket JOIN tbl_product ON tbl_basket.idproduct=tbl_product.id where cookie=?';
//        $sql='select * from tbl_basket where cookie=?';
        $cookie = self::getBasketCookie();
        $params=array($cookie);
        $result = $this->doSelect($sql, $params);
        $priceTotalAll = 0;
        $discountTotalAll = 0;
        foreach ($result as $key => $row) {
            $discount = $row['discount'];
            $price = $row['price'];
            $tedad = $row['tedad'];
            $discountTotal = (($discount * $price) / 100) * $tedad;
            $discountTotalAll += $discountTotal;
            $discountTotalAll = ceil($discountTotalAll);
            $priceTotal = $price * $tedad;
            $priceTotalAll += $priceTotal;
            $priceTotalAll = ceil($priceTotalAll);
            $result[$key]['discountTotal'] = $discountTotal;
        }
        return array($result, $priceTotalAll, $discountTotalAll);
    }

    function calculatePostPrice($cityId = 0)
    {

        $basketInfo = $this->getBasket();
        $priceTotalAll = $basketInfo[1];
        $basket = $basketInfo[0];
        $weightTotalAll = 0;
        foreach ($basket as $row) {
            $weight = $row['weight'];
            $tedad = $row['tedad'];
            $weightTotal = $weight * $tedad;
            $weightTotalAll = $weightTotalAll + $weightTotal;
        }

        $url = 'http://webservice1.link/ws/v1/rest/';
        $helper = new helper($url);
        $buy_type = 1;

        /*$post_type=1;
        $price=$helper->getPrices($cityId,$priceTotalAll,$weightTotalAll,$buy_type,$post_type);
        if($buy_type==1){
            $post_price_pishtaz=$price['posti'][$post_type]['post'];
        }else{
            $post_price_pishtaz=$price['naghdi'][$post_type]['post'];
        }

        $post_type=2;
        $price=$helper->getPrices($cityId,$priceTotalAll,$weightTotalAll,$buy_type,$post_type);
        if($buy_type==1){
            $post_price_sefareshi=$price['posti'][$post_type]['post'];
        }else{
            $post_price_sefareshi=$price['naghdi'][$post_type]['post'];
        }*/


        //in case when api doesn't respond, template prices can be used:
        $post_price_pishtaz = $priceTotalAll / 4;
        $post_price_sefareshi = $priceTotalAll / 5;

        $data = array('pishtaz' => ($post_price_pishtaz / 10), 'sefareshi' => ($post_price_sefareshi / 10));
        return $data;
    }

    public static function jaliliDate($format = 'Y/n/j')
    {
        $date = jdate($format);
        return $date;
    }

    public static function jalaliToGregorian($jalili = '', $format = '/')
    {
        $date='';
        if (isset($jalili)) {
            $jalili = explode('/', $jalili);
            $year = $jalili[0];
            $month = $jalili[1];
            $day = $jalili[2];
            $date = jalali_to_gregorian($year, $month, $day);
            $date = implode($format, $date);
            $date=new DateTime($date);
            $date=$date->format('Y/m/d');
        }
        return $date;
    }

    public static function gregorianToJalali($gregorian = '', $format = '/')
    {
        $date='';
        if (isset($gregorian)) {
            $gregorian = explode('/', $gregorian);
            $year = $gregorian[0];
            $month = $gregorian[1];
            $day = $gregorian[2];
            $date = gregorian_to_jalali($year, $month, $day);
            $date = implode($format, $date);
            $date=new DateTime($date);
            $date=$date->format('Y/m/d');
        }
        return $date;
    }

    function getMenu($parentId=0){
        $sql='select * from tbl_category where parent=?';
        $result=$this->doSelect($sql,array($parentId));
        foreach ($result as $row){
            $children=$this->getMenu($row['id']);
            if(@sizeof($children)>0){
                $row['children']=$children;
            }
            @$data[]=$row;
        }
        return @$data;
    }

    public static function getUserLevel(){
        self::sessionInit();
        $userId=self::sessionGet('userId');
        $sql = 'select * from tbl_user where id=?';
        $userInfo = self::doSelect($sql, array($userId),1);
        if (isset($userInfo['level'])){
            return $userInfo['level'];
        }else{
            return 0;
        }

    }
}

class helper
{
    private $url;
    private $api_key;
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    /**
     * list of errors
     *
     * @var array
     */
    private $errors = array();

    /**
     * @param string $webserviceUrl
     * @param string $api_key
     */

    public function __construct($webserviceUrl)
    {
        $this->url = $webserviceUrl;
        $this->api_key = 'XXXXXXXXXXXXXXXX';

    }

    public function getPrices($des_city, $price, $weight, $buy_type, $delivery_type)
    {
        $params = array(
            'des_city' => $des_city,
            'price' => $price,
            'weight' => $weight,
            'buy_type' => $buy_type,
            'send_type' => $delivery_type
        );
        return $this->call('order/getPrices.json', $params);
    }

    private function call($url, $params, $methodType = helper::METHOD_POST)
    {
        //flush error list
        $this->errors = array();
        if (stripos($url, 'http://') === false)
            $url = $this->url . $url;
        $params['api'] = $this->api_key;
        $data = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, $methodType === helper::METHOD_POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        $result = json_decode($result, true);
        if (json_last_error() == JSON_ERROR_NONE)
            return $this->parseResponse($result);
        throw new FrotelResponseException('Failed to Parse Response (' . json_last_error() . ')');
    }

    /**
     * parse webservice response
     *
     * @param array $response
     * @return bool
     * @throws FrotelResponseException
     * @throws FrotelWebserviceException
     */
    private function parseResponse($response)
    {
        if (!isset($response['code'], $response['massage'], $response['result']))
            throw new FrotelResponseException('پاسخ دریافتی از سرور معتبر نیست.');
        if ($response['code'] == 0)
            return $response['result'];
        $this->errors[] = $response['massage'];
        throw new FrotelWebserviceException($response['massage']);
    }

    function getErrors()
    {
        return $this->errors;
    }
}

class FrotelResponseException extends Exception
{
}

class FrotelWebserviceException extends Exception
{
}