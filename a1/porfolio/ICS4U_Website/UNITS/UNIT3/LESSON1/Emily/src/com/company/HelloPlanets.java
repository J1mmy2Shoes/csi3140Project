package com.company;

public class HelloPlanets {
    public static void main(String[] args)
    {
        String[] planets = {"Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "Pluto"};
        for (int j=0;j<planets.length;j++)
        {
            System.out.println("Hello "+planets[j]+"!");
        }
    }
}
