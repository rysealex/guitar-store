/* The JavaScript for the shipping page */

"use strict";

const $ = selector => document.querySelector(selector);

const calculate = (cost) => {
    if (isNaN(cost) || cost <= 0) {
        alert("Product cost must be a number greater than 0.");
    } else {
        const totalCost = calculateShipping(cost);
        $("#totalCost").value = totalCost;
    }
    $("#cost").focus();
};

const calculateShipping = (cost) => {
    if (cost < 50) {
        return cost + (cost * 0.20);
    } else if (cost < 200) {
        return cost + (cost * 0.18);
    } else if (cost < 500) {
        return cost + (cost * 0.15);
    } else if (cost < 1000) {
        return cost + (cost * 0.12);
    } else {
        return cost + (cost * 0.08);
    }
};

document.addEventListener("DOMContentLoaded", () => {
   $("#calculate").addEventListener("click", () => {
       const cost = parseFloat($("#cost").value);
       calculate(cost);
   }); 
});