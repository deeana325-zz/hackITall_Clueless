<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<script>  function passvalues(){
        var firstname=document.getElementById("post-items-container").value;
        localStorage.setItem("textvalue", firstname);
                           // key + value
        return false;
    }  </script>    

<header class="page-header gradient">
    
      <div class="container pt-3">
        <h2>Search Company for its stocks</h2>

  
      <div>
        <div class="search_select_box col-md-5">
        <select class="w-100" data-live-search="true" id="post-items-container">
        </select>
        </div>  
      </div>
      
      <script src="js/post.js"></script>
      <script> 
        listsPosts('post-items-container');
        </script>
     <script src="js/script.js"></script>
    
    <form class="search-bar col-md-5" action="gallery.php">
            <input class="btn btn-primary" type="submit" value="Search" onclick="passvalues();"/>
    </form>

    </div>
    
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>

     

</header>


<?php include('components/icons.inc.php'); ?>
<?php require('components/footer.inc.php'); ?>

