var array = {
    "name" : "Yaroslav",
    "age" : 26,
    "city" : "Almaty",
    "phoneNumber" : "+7 707 669 14 24",
    "Location" : "Kazahstan",
    "Language" : {
        "firs" : "PHP",
        "second" : "JavaScript"
    }
}

var strArray = JSON.stringify(array);
var arArray = JSON.parse(strArray);
console.log(array);
console.log(strArray);
console.log(arArray.Language.firs);


