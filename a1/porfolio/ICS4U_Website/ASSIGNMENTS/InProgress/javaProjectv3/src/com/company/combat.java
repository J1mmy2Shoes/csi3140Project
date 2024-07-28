package com.company;
import java.util.*;
import java.io.*;
public class combat{
    public static boolean floor(int playerSpeed, int mobSpeed, int [] fightOrder){
        //Checks if its faster than both the mobs
        if (combatTurn()&&combatTurn()){
            yourTurn();
        }
        else if (combatTurn())
    }
    /*public static boolean yourTurn(int decision){
        //insert parameters
        if (decision==1){
            attack();
        }
        else if (decision==2){
            magicAttack();
        }
        else if (decision==3){
            heal();
        }
    }*/
    public static boolean combatTurn(int playerSpeed, int mobSpeed, int playerSpeed2, int mobSpeed2){
        //System.out.println("Turn "+turnCount);
        if(playerSpeed>mobSpeed)
        {
            return true;
        }
        else{
            return false;
        }
    }
    public static int attack(int mobHP, int mobDef, int playerAtk){
        mobHP = (mobHP + mobDef) - playerAtk;
        System.out.println("You attacked some! He has " + mobHP + " HP");
        return mobHP;
    }
    public static int magicAttack(int mobHP, int mobRes, int playerMag){
        mobHP = (mobHP + mobRes) - playerMag;
        System.out.println("You attacked some ! He has " + mobHP + " HP");
        return mobHP;
    }
    public static int heal(int HP1, int HP2, int playerMag){
        Scanner scan = new Scanner(System.in);
        System.out.println("Who do you want to heal? 1 for yourself, 2 for your partner!");
        int choice = scan.nextInt();
        if (choice==1){
            HP1 = HP1 + playerMag;
            System.out.println("You healed yourself! You have " + HP1 + " HP now!");
            return HP1;
        }
        else{
            HP2 = HP2 + playerMag;
            System.out.println("You healed Howard! She has " + HP2 + " HP now!");
            return HP2;
        }
    }
/*    public static int enemyTurn(int mobHP, int mobHP2){
        //Just have to insert parameters but idk what they are rn
        if (mobHP<5){
            enemySelfHeal();
        }
        else if (mobHP2<5) {
            enemyPartnerHeal();
        }
        else{
            enemyAtk();
        }
    }*/
    public static int enemyAtk(int playerHP, int playerDef, int playerRes, int mobHP, int mobAtk, int mobMag, int mobHP2){
        if (playerDef < playerRes) {
            playerHP = (playerHP + playerDef) - mobAtk;
        }
        else if (playerDef == playerRes) {
            if (Math.random() < 0.5) {
                playerHP = (playerHP + playerDef) - mobAtk;
            }
            else {
                    playerHP = (playerHP + playerRes) - mobMag;
            }
        }
        else {
            playerHP = (playerHP + playerRes) - mobMag;
        }
        return playerHP;
    }

    public static int enemySelfHeal(int mobHP, int mobMagic)
    {
        mobHP = mobHP + mobMagic;
        return mobHP;
    }
    public static int enemyPartnerHeal(int mobHP1, int mobHP2, int mobMag1)
    {
        mobHP2 = mobHP2 + mobMag1;
        return mobHP2;
    }

}


