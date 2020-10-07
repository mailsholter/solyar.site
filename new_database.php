<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
if(isset($_POST['crt'])){
  $create_database = pg_query("CREATE DATABASE lusiadas;");
  if($create_database){
    echo "done";
    $x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=lusiadas options='--client_encoding=UTF8'");
    $create_table = pg_query('CREATE TABLE public.purchase (
      "id" integer,
      "Бренд" character varying,
      "Модель" character varying,
      "Кількість" integer,
      "тип" character varying,
      "ціна" numeric,
      "customer_code" numeric,
      "purchase_code" numeric,
      adress_vidpr character varying);');
      if($create_table){
        echo "ok";
      }
      else{
        echo "not ok";
      }
      $create_table = pg_query('CREATE TABLE public.notebook(
        "виробник" character varying,
        "модель" character varying,
        "тип" character varying,
        "кількість" integer,
        "ціна" numeric(20,2),
        "опис" character varying,
        img character varying(300)[],
        "imag" character varying);');
        if($create_table){
          echo "ok";
        }
        else{
          echo "not ok";
        }
        $create_table = pg_query('CREATE TABLE public.покупці(
          name character varying NOT NULL,
          surname character varying NOT NULL,
          login character varying NOT NULL,
          password character varying NOT NULL,
          adress character varying,
          "phone number" character varying,
          "client_code" numeric,
          "корзина" character varying);');
          if($create_table){
            echo "ok";
          }
          else{
            echo "not ok";
          }
          $create_table = pg_query('CREATE TABLE public.Стіралки(
            "виробник" character varying,
            "модель" character varying,
            "кількість" integer NOT NULL,
            "тип" character varying,
            "ціна" numeric(20,2),
            "опис" character varying,
            img character varying(300)[],
            "imag" character varying);');
            if($create_table){
              echo "ok";
            }
            else{
              echo "not ok";
            }
            $create_table = pg_query('CREATE TABLE public.Телефон(
              "виробник" character varying,
              "модель" character varying,
              "кількість" integer NOT NULL,
              "тип" character varying,
              "ціна" numeric(20,2),
              "опис" character varying,
              img character varying(300)[],
              "imag" character varying);');
              if($create_table){
                echo "ok";
              }
              else{
                echo "not ok";
              }
              $create_table = pg_query('CREATE TABLE public.Холодильники(
              "виробник" character varying,
              "модель" character varying,
              "кількість" integer NOT NULL,
              "тип" character varying,
              "ціна" numeric(20,2),
              "опис" character varying,
              img character varying(300)[],
              "imag" character varying);');
                if($create_table){
                  echo "ok";
                }
                else{
                  echo "not ok";
                }
                $create_table = pg_query('CREATE TABLE public.телевізори(
                  "виробник" character varying,
                  "модель" character varying,
                  "кількість" integer NOT NULL,
                  "тип" character varying,
                  "ціна" numeric(20,2),
                  "опис" character varying,
                  img character varying(300)[],
                  "imag" character varying);');
                  if($create_table){
                    echo "ok";
                  }
                  else{
                    echo "not ok";
                  }
  }
  else{
    echo "not done";
  }
}
?>
<!-- DROP DATABASE lusiadas -->