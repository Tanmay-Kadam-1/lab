package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class HomeController {

    @GetMapping("/")
    public String home(Model model) {
        model.addAttribute("bill", 0.0);
        return "home";
    }

    @PostMapping("/calculate")
    public String calculate(@RequestParam("units") int units, Model model) {
        double bill = calculateBill(units);
        model.addAttribute("bill", bill);
        return "home";
    }

    private double calculateBill(int units) {
        double bill = 0.0;
        if (units <= 50) {
            bill = units * 3.50;
        } else if (units <= 150) {
            bill = 50 * 3.50 + (units - 50) * 4.00;
        } else if (units <= 250) {
            bill = 50 * 3.50 + 100 * 4.00 + (units - 150) * 5.20;
        } else {
            bill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + (units - 250) * 6.50;
        }
        return bill;
    }
}
