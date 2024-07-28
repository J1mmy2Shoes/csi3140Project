package com.company;
import java.util.*;
import java.io.*;

public class createMob {
    String name= "poo";
    //stats go [hp, attack, magic, def, magic resist, speed]
    int[] mobStats=new int[6];
    //character creation
    public static int[] statsCalc(String type){
        //makes sure that the player stats are kinda balanced
        int[] coreStats={15,5,5,5,5,2};

        if(type.equals("player")){
            for(int statPoints=20;statPoints>0;statPoints--){
                int pointInto=(int) Math.round(Math.random()*5);

                coreStats[pointInto]=coreStats[pointInto]+1;
            }
            return coreStats;
        }

        else{
            return coreStats;
        }
    }

    //character improvement
    public static int[] statAdd(int upgrades,int[] stats){
        int[] temp=stats;

        do{
            Scanner addTo=new Scanner(System.in);
            System.out.println("You have "+upgrades+" upgrade points remaining. What stats would you like to improve by 1 point?");
            System.out.println("1) Hp 2) Attack 3) Magic 4) Defense 5) Magic Resist 6) Speed");
            int intoWhat=addTo.nextInt();
            intoWhat-=1;
            temp[intoWhat]=temp[intoWhat]+1;
            upgrades--;
        }while(upgrades>0);

        System.out.println("Your new stats are "+temp[0]+" "+temp[1]+" "+temp[2]+" "+temp[3]+" "+temp[4]+" "+temp[5]+" ");
        return temp;
    }
}

