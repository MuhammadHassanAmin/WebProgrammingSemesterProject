<?php include 'includes/config.php';  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <?php include 'includes/links.php'; ?>
    <style>
        .gallery img{
            width:25%;
        }
        /* 
        Generic Styling, for Desktops/Laptops 
        */
        table { 
        width: 100%; 
        border-collapse: collapse; 
        }
        /* Zebra striping */
        tr:nth-of-type(odd) { 
        background: #eee; 
        }
        th { 
        background: #333; 
        color: white; 
        font-weight: bold; 
        }
        li, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 
        }

        @media only screen and (max-width: 760px),
        (min-width: 768px) and (max-width: 1024px)  {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr { 
                display: block; 
            }
            
            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr { 
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            
            tr { border: 1px solid #ccc; }
            
            td { 
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee; 
                position: relative;
                padding-left: 50%; 
            }
            
            td:before { 
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%; 
                padding-right: 10px; 
                white-space: nowrap;
            }
            td:nth-of-type(1):before { content: "Name"; }
            td:nth-of-type(2):before { content: "Description"; }

            #pk td:nth-of-type(1):before { content: "Name"; }
            #pk td:nth-of-type(2):before { content: "Price"; }
            #pk td:nth-of-type(3):before { content: "Description"; }
            .gallery img{
                width:90%;
            }
        }
        .packbtn{

        }
        .featurebtn{

        }
        .packbtn:hover{
            color:red;
            cursor:pointer;
        }
        .featurebtn:hover{
            color:red;
            cursor:pointer;
        }
        input{
            display:none;
        }
        ul{
            list-style:none;
        }

    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
    <div class="admin-form">
    <?php 
            if (isset($_GET['id'])) {
                ?>
            <h1>Hostel Details!</h1>  
                <div>
                    <?php 
                    $id=$_GET['id'];
                    $query = "SELECT * FROM hostels where id='".$id."'";                    
                    $result = $db->query($query);
                    if (!empty($result)) {
                        while ($item = mysqli_fetch_assoc($result)) {
                            ?>
                            <ul>
                                <li>Hostel: <?php echo $item['hostel_name'] ?></li>
                                
                                <li>Type: <?php echo $item['hostel_type'] ?></li>
                                
                                <li>City: <?php echo $item['hostel_city'] ?></li>
                                
                                <li>Sector: <?php echo $item['hostel_sector'] ?></li>
                                
                                <li>Address: <?php echo $item['hostel_address'] ?></li>
                               
                                    <input type="hidden" id="pb" name="status" value="<?php echo $item['id'] ?>">
                            </ul>                                
                            <?php
                        }
                    }
                    ?>
                </div>
                <div id="packages">
                    <?php include 'view_packages.php' ?>
                </div>
                <div id="features">
                    <?php include 'view_features.php' ?>
                </div>
                <div id="gallery">
                    <?php include 'view_gallery.php' ?>
                </div>
        <?php 
            }
            else
            {
                ?><p>Not Logged In!</p><?php 
            }
        ?>
    </div>
    <?php include 'includes/footer.php' ?>
</body>
</html> 
<script>
    $(document).ready(function(){
       //$('#pfdata').load('view_packages.php','status='+$('input[name=status]:checked').val());
        $('#packages').load('view_packages.php','status='+$('input[name=status]').val()+'&mod=view');
        $('#packages').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        $('#features').load('view_features.php','status1='+$('input[name=status]').val()+'&mod=view');
        $('#features').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        $('#gallery').load('view_gallery.php','status2='+$('input[name=status]').val()+'&mod=view');
        $('#gallery').html("<img src='graphics/loading.gif' alt='Loading Pictures...'>");
    });
    
</script>
