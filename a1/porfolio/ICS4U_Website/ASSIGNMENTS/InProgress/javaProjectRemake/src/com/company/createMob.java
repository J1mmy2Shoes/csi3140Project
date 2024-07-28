package com.company;
import java.util.*;
import java.io.*;

public class createMob {
    //refere to member1. and member2.
    //refer to enemy1. and enemy2.
    String name= "";
    public int difficulty=1;
    //stats go [hp, attack, magic, def, magic resist, speed]
    int[] mobStats=new int[6];


    //mob creation and randomization
    public int[] statsCalc(int[] coreStats, String type){
        if(type.equals("player")){
            //makes sure that the player stats are kinda balanced
            double companion=Math.random();
            coreStats= new int[]{15, 5, 5, 5, 5, 2};
            for(int statPoints=20;statPoints>0;statPoints--){
                int pointInto=(int) Math.round(Math.random()*5);

                coreStats[pointInto]=coreStats[pointInto]+1;
            }

            //random name for companion
            if(companion<=0.25){
                this.name="Kowan";
            }

            else if(companion<0.5){
                this.name="Howard";
            }

            else if(companion<0.75){
                this.name="YiBo";
            }

            else{
                this.name="James";
            }

            return coreStats;
        }

        else{
            int extraPoints=(this.difficulty*5)+5;

            while(extraPoints>0){
                extraPoints--;
                double chanceOf=Math.random();

                //the following code buffs the enemies based on core stats. the higher the core stat the higher the chance that is has to be increased.
                //this way, defense mobs stay defense and atk mobs stay atk. MATH MAKES SENSE!!!
                if(chanceOf<((double)(coreStats[0])/coreStats[6])){
                    coreStats[0]+=1;
                }

                else if(chanceOf<((double)(coreStats[0]+coreStats[1])/coreStats[6])){
                    coreStats[1]+=1;
                }

                else if(chanceOf<((double)(coreStats[0]+coreStats[1]+coreStats[2])/coreStats[6])){
                    coreStats[2]+=1;
                }

                else if(chanceOf<((double)(coreStats[0]+coreStats[1]+coreStats[2]+coreStats[3])/coreStats[6])){
                    coreStats[3]+=1;
                }

                else if(chanceOf<((double)(coreStats[0]+coreStats[1]+coreStats[2]+coreStats[3]+coreStats[4])/coreStats[6])){
                    coreStats[4]+=1;
                }

                else{
                    coreStats[5]+=1;
                }
            }
            //System.out.println(Arrays.toString(coreStats));
            return coreStats;
        }
    }

    //character improvement
    public static int[] statAdd(int upgrades,int[] stats,String member){
        int[] temp=stats;

        do{
            Scanner addTo=new Scanner(System.in);
            System.out.println("You have "+upgrades+" upgrade points remaining for "+member+". What stats would you like to improve by 1 point?");
            System.out.println("1) Hp 2) Attack 3) Magic 4) Defense 5) Magic Resist 6) Speed");
            int intoWhat=addTo.nextInt();
            intoWhat-=1;
            temp[intoWhat]=temp[intoWhat]+1;
            upgrades--;
        }while(upgrades>0);

        System.out.println("Your new stats are for"+member+"HP: "+temp[0]+", Attack: "+temp[1]+", Magic: "+temp[2]+", Defense: "+temp[3]+", Magic Resist "+temp[4]+", Speed: "+temp[5]+" ");
        return temp;
    }

    public int[] randomMob()throws IOException{
        //reading from a file
        BufferedReader br=new BufferedReader(new FileReader("mobStats.csv"));
        BufferedReader howMany=new BufferedReader(new FileReader("mobStats.csv"));

        int mob;
        String line="";
        int totalLines=0;
        int[] temp=new int[7];

        while(line!=null){
            line = howMany.readLine();
            totalLines+=1;
        }

        //array for every single mob?
        String[][] everyMob=new String[totalLines][8];

        //makes array full of the mobs
        for(int pos=0;pos<totalLines;pos+=1){
            line=br.readLine();

            if(line!=null){
                String[] insert = line.split(",");
                everyMob[pos] = insert;
            }
        }


        //random number between 1 and everyMob.length and chose mob
        mob=(int) Math.floor(Math.random()*(everyMob.length-2)+1);
        br.close();
        howMany.close();

        //System.out.println(Arrays.toString(everyMob[mob]));
        this.name=everyMob[mob][0];

        for(int index=1;index<8;index++){
            temp[index-1]=Integer.parseInt(everyMob[mob][index]);
        }

        //System.out.println(this.name);
        return this.mobStats=statsCalc(temp,this.name);
    }
}


