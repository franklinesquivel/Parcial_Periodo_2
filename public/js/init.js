(function () {

    document.addEventListener("DOMContentLoaded", function () {
       M.AutoInit();

       if(dpdItem != null){
           M.Dropdown.init(dropA, {
               alignment: 'right',
               constrainWidth: false,
               coverTrigger: false
           });
       }
    });

})
();