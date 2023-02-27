
    $(document).ready(function(){ //apna document ready hai ki nahi check karta hai uske bd aghe ka code ko run karta hai
        
        console.log("we are using jqurey");
        // $('selector').action() <-- syntax
        $('p').click(function () {
            console.log("you clicked");
            // $('p').hide();
            // $(this).hide();
            // $(#id).hide();
            // $(.class)).hide();
            
        });//do this on click
    });
    
    // there are three main types of selectors in jQuery
    // 1. element selector
    // $('p').click();
    
    // 2. id selector
    // $(#id).click();
    
    
    // 3. class selector
    // $(.class)).click();

