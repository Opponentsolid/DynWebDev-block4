<?php

// Library of methods to support the Web Service

//  function to convert a single record from database to XML
function convertToXML($query) {
    $txt ='<news>' ;
    $txt = $txt.'<nid>'.$query["nid"].'</nid>' ;
    $txt = $txt.'<title>'.$query["title"].'</title>' ;
    $txt = $txt.'<description>'.$query["description"].'</description>' ;
    $txt = $txt.'<image>'.$query["image"].'</image>' ;
    $txt = $txt.'<link>'.$query["link"].'</link>' ;
    $txt = $txt.'</news>' ;
    return $txt ;
}

// function to get all (max 12) employees
function getAllNews()
{
    global $conn;
    $query="select * from news order by nid desc limit 12";
    $result=mysqli_query($conn, $query);
    $txt = '<news>';
    while($row=mysqli_fetch_array($result))
    {
        $txt = $txt.convertToXML($row) ;
    }
    $txt = $txt.'</news>' ;
    return $txt ;
}


//  function to get a specific employee
function getNews($nid)
{
    global $conn;
    $query="select * FROM news where nid=".$nid ;
    $result=mysqli_query($conn, $query);
    $response = mysqli_fetch_array($result) ;
    $txt = convertToXML($response) ;
    return $txt ;
}

//  function to insert a single employee
function insertNews($xml)
{
    global $conn;
    $data = simplexml_load_string($xml);
    $news_title=$data -> title;
    $news_descr=$data -> description;
    $news_image=$data -> image;
    $news_link=$data -> link;

    $query="INSERT INTO news SET title='".$news_title."', description='".$news_descr."', image='".$news_image."', link='".$news_link."'";
    $response = mysqli_query($conn, $query) ;
    if($response)
    {
        $resp = 1 ;
    }
    else
    {
        $resp = 0 ;
    }
    return $resp ;
}

//  function to update a specific employee
function updateNews($nid, $xml)
{
    global $conn;
    $data = simplexml_load_string($xml);
    $news_title=$data -> employee_name;
    $news_descr=$data -> employee_salary;
    $news_image=$data -> employee_age;
    $news_link=$data -> link;
    $query="UPDATE news SET title='".$news_title."', description='".$news_descr."', image='".$news_image."', link='".$news_link."' WHERE nid=".$nid;
    $response = mysqli_query($conn, $query) ;
    if($response)
    {
        $resp = 1 ;
    }
    else
    {
        $resp = 0 ;
    }
    return $resp ;
}

//  function to delete a specific employee
function deleteNews($nid)
{
    global $conn;
    $query="DELETE FROM news WHERE nid=".$nid;
    $response = mysqli_query($conn, $query) ;
    if($response)
    {
        $resp = 1 ;
    }
    else
    {
        $resp = 0 ;
    }
    return $resp ;
}

?>