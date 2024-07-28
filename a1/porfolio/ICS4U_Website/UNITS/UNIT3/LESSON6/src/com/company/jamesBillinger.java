/*
James Billinger
04/14/2020
jamesBillinger.java
The file contains the code for the unit 3 arrays assignment
 */
package com.company;
import java.io.*;
import java.util.*;

public class jamesBillinger {
    public static void main(String[] args)
    {
        //String ArrayList to get file
        ArrayList<String> dataList=new ArrayList();
        String line="";

        //Putting string file data into ArrayList
        try
        {
            FileReader fr=new FileReader("rawNumbers.csv");
            BufferedReader br=new BufferedReader(fr);
            while(line!=null)
            {
                line=br.readLine();
                if(line!=null)
                {
                    dataList.add(line);
                }
            }
            br.close();
        }
        catch (IOException ex)
        {
            System.out.println("Error reading from the file..."+ex.getMessage());
        }

        //Remove "id"
        if(dataList.contains("id")==true)
        {
            dataList.remove("id");
        }

        //ArrayList to array (Source: https://stackoverflow.com/questions/5374311/convert-arrayliststring-to-string-array)
        String[] dataStrArr=new String[dataList.size()];
        dataStrArr=dataList.toArray(dataStrArr);

        //Convert string array to int array
        int [] dataIntArr=new int[dataStrArr.length];
        for(int x=0;x<dataStrArr.length;x++)
        {
            dataIntArr[x]=Integer.parseInt(dataStrArr[x]);
        }

        //Variables
        int maximum=0;
        int minimum=0;
        int sum=0;
        int avgerage=0;
        maximum=dataIntArr[0];
        minimum=dataIntArr[0];

        //For loop to check the elements of the array
        for(int x=0;x<dataIntArr.length;x++)
        {
            //Find maximum
            if(dataIntArr[x]>maximum)
            {
                maximum=dataIntArr[x];
            }

            //Find minimum
            if (dataIntArr[x]<minimum)
            {
                minimum=dataIntArr[x];
            }

            //Find sum
            sum+=dataIntArr[x];
        }
        //Find average
        avgerage=sum/dataIntArr.length;

        //Output
        System.out.println("The largest number is: "+maximum);
        System.out.println("The smallest number is: "+minimum);
        System.out.println("The average is: "+avgerage);
        System.out.println("The first 5 numbers are: "+dataIntArr[0]+", "+dataIntArr[1]+", "+dataIntArr[2]+", "+dataIntArr[3]+", "+dataIntArr[4]);
        System.out.println("The last 5 numbers are: "+dataIntArr[dataIntArr.length-5]+", "+dataIntArr[dataIntArr.length-4]+", "+dataIntArr[dataIntArr.length-3]+", "+dataIntArr[dataIntArr.length-2]+", "+dataIntArr[dataIntArr.length-1]);
    }
}
