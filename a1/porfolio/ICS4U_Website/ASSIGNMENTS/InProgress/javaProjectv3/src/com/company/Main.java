package com.company;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.Arrays;
import java.util.Scanner;

public class Main {
    public int difficulty=1;

    public static void main(String[] args) throws IOException {
        //declare 2 party memebers. you and random.
        createMob member1=new createMob();
        member1.mobStats=member1.statsCalc("player");
        createMob enemy1=new createMob();


        //declare inputs
        Scanner playerInput=new Scanner(System.in);

        //some fighting and round variables
        int round=1, HP1 = member1.mobStats[0];

        //array for every single mob?
        BufferedReader br=new BufferedReader(new FileReader("mobStats.csv"));
        BufferedReader howMany=new BufferedReader(new FileReader("mobStats.csv"));

        String line="";
        int totalLines=0;
        while(line!=null){
            line = br.readLine();
            totalLines+=1;
        }

        String[][] everyMob=new String[totalLines][7];

        for(int pos=0;pos<totalLines;totalLines+=1){
            line=howMany.readLine();
            if(line==null){

            }

            else {
                String[] insert = line.split(",");
                everyMob[pos] = insert;
                System.out.println(Arrays.toString(everyMob[pos]));
            }
        }

        //beginning of the tutorial
        System.out.println("Welcome to the Tower of Krnic! Your goal is to reach the top of a 100 floor tower! At the top, you will win a grand prize! I think...");
        System.out.println("What is your name adventurer?");
        member1.name = playerInput.nextLine();
        System.out.println("Hello "+member1.name+"!");
        System.out.println("Now you will enter floor 1");

        System.out.println("Your stats are as follows: "+member1.mobStats[0]+" "+member1.mobStats[1]+" "+member1.mobStats[2]+" "+member1.mobStats[3]+" "+member1.mobStats[4]+" "+member1.mobStats[5]+" ");
        member1.statAdd(4,member1.mobStats);

    }
}