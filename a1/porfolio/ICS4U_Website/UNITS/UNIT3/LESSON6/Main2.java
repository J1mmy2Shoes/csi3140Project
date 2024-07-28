/*
Yi Bo Cheng
04/14/2020
yiboCheng.java
This contains the code for the unit 3 assignment
 */
package com.company;
import java.io.*;
import java.util.*;

public class Main {
    public static void main(String[] args)
    {
        //string ArrayList to get file
        ArrayList<String> dataList=new ArrayList();
        String line="";

        //get string file data into ArrayList
        try
        {
            FileReader fr=new FileReader("rawNumbers.csv");
            BufferedReader br=new BufferedReader(fr);
            while(line!=null)
            {
                line=br.readLine();
                if(line!=null)
                {
                    //System.out.println(line);
                    dataList.add(line);
                }
            }
            br.close();
        }
        catch (IOException ex)
        {
            System.out.println("Error reading form the file..."+ex.getMessage());
        }

        //remove "id" if it exists
        if(dataList.contains("id")==true)
        {
            dataList.remove("id");
        }

        //ArrayList to array (Source: https://stackoverflow.com/questions/5374311/convert-arrayliststring-to-string-array)
        String[] dataStrArr=new String[dataList.size()];
        dataStrArr=dataList.toArray(dataStrArr);

        //convert string array to int array
        int [] dataIntArr=new int[dataStrArr.length];
        for(int x=0;x<dataStrArr.length;x++)
        {
            dataIntArr[x]=Integer.parseInt(dataStrArr[x]);
        }
        //System.out.println(dataIntArr[0]+dataIntArr[1]);
        //System.out.println(Arrays.toString(dataIntArr));

        //find max min and avg
        int max=0;
        int min=0;
        int sum=0;
        int avg=0;
        max=dataIntArr[0];
        min=dataIntArr[0];

        //for loop to check all elements of the array
        for(int x=0;x<dataIntArr.length;x++)
        {
            //find sum
            sum+=dataIntArr[x];

            //find max
            if(dataIntArr[x]>max)
            {
                max=dataIntArr[x];
            }

            //find min
            if (dataIntArr[x]<min)
            {
                min=dataIntArr[x];
            }
        }
        //find average
        avg=sum/dataIntArr.length;

        //output
        System.out.println("The largest number is: "+max);
        System.out.println("The smallest number is: "+min);
        System.out.println("The average is: "+avg);
        //first 5 numbers
        System.out.println("The first 5 numbers are: "+dataIntArr[0]+", "+dataIntArr[1]+", "+dataIntArr[2]+", "+dataIntArr[3]+", "+dataIntArr[4]);
        //last 5 numbers
        System.out.println("The last 5 numbers are: "+dataIntArr[dataIntArr.length-5]+", "+dataIntArr[dataIntArr.length-4]+", "+dataIntArr[dataIntArr.length-3]+", "+dataIntArr[dataIntArr.length-2]+", "+dataIntArr[dataIntArr.length-1]);
    }
}
