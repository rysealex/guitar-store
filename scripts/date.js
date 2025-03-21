"use strict";

// creating the dynamic current date
const currDate = new Date();
const day = currDate.getDate();
const month = currDate.getMonth() + 1;
const year = currDate.getFullYear();

// format the current date accordingly 
const formatDate = `${month}/${day}/${year}`;
// set the formatted date to the associated date id in html
document.querySelector("#date").textContent = formatDate;