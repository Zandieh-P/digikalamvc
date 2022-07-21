function ostan(tag){
    let is=$(tag).find('option:selected').attr('data-val');

    let arr=new Array();
    if(id=41){arr=['آذر شهر','اسکو','اهر','بستان آباد','...'];}
    if(id=44){arr=['ارومیه','اشنویه','بازرگان','بوکان','...'];}
    if(id=86){arr=['اراک','شازند','محلات','خمین','...'];}
    if(id=76){arr=['بوشهر','بندر دیلم','بندر گناوه','دلوار','...'];}
    if(id=81){arr=['همدان','لالجین','جوکار','ملایر','...'];}
    if(id=35){arr=['یزد','تفت','میبد','مهریز','...'];}

    $('.shahr').find('select option').remove();
    let k=0;
    if(arr.length>0){
        for(k=0;k<arr.length;k++){
            $('.shahr').find('select').append($('<option>',{
                text: arr[k],
                value: arr[k]
            }));
        }
    }

    $('.selectpicker').selectpicker('refresh');
}
