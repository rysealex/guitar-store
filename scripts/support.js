/* The JavaScript for the support page */

"use strict";

// the jQuery code for the accordion
$(document).ready(function() {
    $(".accordion").accordion({
        collapsible: true,
        active: false,
        icons: false
    });
});

/*const $ = selector => document.querySelector(selector);

// keep track of current open div element
let currentOpenDiv = null;

const toggle = evt => {
    // get the current h2 and div elements
    const h2Element = evt.currentTarget;
    const divElement = h2Element.nextElementSibling;
    // check if current open div element is present and 
    // different from new div element
    if (currentOpenDiv && currentOpenDiv !== divElement) {
        // remove toggle effect from current open div element
        currentOpenDiv.classList.remove("open");
        currentOpenDiv.previousElementSibling.classList.remove("minus");
    }
    h2Element.classList.toggle("minus");
    divElement.classList.toggle("open");
    // update current open div element
    currentOpenDiv = divElement.classList.contains("open") ? divElement : null;
    evt.preventDefault();
};

document.addEventListener("DOMContentLoaded", () => {
    // get all h2 elements
    const h2Elements = faqs.querySelectorAll("#faqs h2");
    // attach toggle event handler to each h2 element
    for (let h2Element of h2Elements) {
        h2Element.addEventListener("click", toggle);
    }
    // focus the first h2 element
    h2Elements[0].firstChild.focus();
});*/