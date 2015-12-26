/**
 * Created by Artur_Tigranyan on 24.12.2015.
 */

/*
* Problem
 You want to select unconventional HTML elements, such as HTML elements that may contain a given
 piece of text, elements in a particular place in a sequence, or odd- or even-numbered elements in the
 HTML file.
*
 You want to create a DOM node dynamically. In this recipe, we will create an h2 element on the fly and
 add it before an existing paragraph element in an HTML file.

 You want to display a list of names using arrays. That is, assuming that an array containing names exists,
 you want to display its elements on a web page.

 You want to manipulate array elements for tasks like applying serial numbers to them, converting them
 to uppercase, and other tasks similar to these.

 You have an array that contains some names and you want to filter it to see only the desired names. For
 example, you may want to see only those names with a length of more than four characters.

 You have student information stored in the form of an array of objects. Each student object is assumed
 to consist of three attributes: role, name, and emailId. You want to sort the array on the basis of its
 attributesrole.

* */

$(document).ready(function(){
    var strNames = [ "John", "Steve", "Ben", "Damon","Ian"];
    var numbers  = [1, 23, 43, 12, 98, -43, 25];


})

$(document).ready(function() {
    var members = [45, 10, 3, 22, 7];
    $('p.allnum').html(members.join("<br>"));
    memsecond = members.splice(0,3);
    $('p.firstp').html(memsecond.join("<br />"));
    $('p.secondp').html(members.join("<br />"));
});


/*

$(document).ready(function() {
    var members = [ "John", "Steve", "Ben", "Damon","Ian" ];
    $('p.allmem').html(members.join("<br />"));
    members = members.sort();
    $('p.sorted').html(members.join("<br />"));
});

$(document).ready(function() {
    var members = [45, 10,3,22,7 ];
    $('p.allmem').html(members.join("<br>"));
    members = members.sort(function(a,b){
        return a-b;
    });
    $('p.sorted').html(members.join("<br>"));
});

$(document).ready(function() {
    var members = [ "John", "Steve", "Ben", "Damon","Ian" ];
    $('p.allmem').html(members.join("<br/>"));
    members = $.grep(members, function(v) { return v.length > 4});
    $('p.selected').html(members.join("<br/>"));
});


$(document).ready(function() {
    var members = [ "John", "Steve", "Ben", "Damon","Ian" ];
    $('p.allmem').html(members.join("<br/>"));
    members = $.grep(members, function(v) { return v.match(/^[A-D]/)});
    $('p.selected').html(members.join("<br/>"));
});

$(document).ready(function() {
    var members = [ "John", "Steve", "Ben", "Damon", "Ian" ];
    members = $.map(members, function(n,i){ return(i+1+"."+n); });
    $('p').html(members.join("<br />"));
});

$(document).ready(function() {
    var names = $("li").get();
    $('p').text("Following are the " + names.length + " members of my Group");
});

$(document).ready(function() {
    var memlist = $( "#list" );
    var members = [ "John", "Steve", "Ben", "Damon", "Ian" ];
    $.each(members,function( index, value ){
        memlist.append($( "<li>" + value + "</li>" ));
    });
});

$(document).ready(function() {
    var members = [ "John", "Steve", "Ben", "Damon", "Ian" ];
    $('p').text(members.join(", "));
});

$(document).ready(function(){
    $('body').addClass('other')
    $('p').addClass('highlight')
});

$(document).ready(function(){
    $('p').prepend('<h2> Power of selectors </h2>');
})

$(document).ready(function(){
    $('span:contains(Life)').addClass('highlight');
    $('div:odd').addClass('highlight');
    $('div:even').addClass('boundary');
    $('p:eq(1)').addClass('linkstyle');
});

$(document).ready(function(){
   var nodes = $('#root').children();
    //alert("number of nodes" + nodes.length)
    var txt = "";
    $('#root').children().each(function(){
        txt += $(this).text()
    })
    //alert(txt)
});

$(document).ready(function(){
    //alert($('p').html());
});
    */