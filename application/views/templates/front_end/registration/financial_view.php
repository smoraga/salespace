<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <div class="container">
            <h1>Financial Information</h1>
            
            <form action="" method="">
                <label>Tin Number</label>
                <input type="text" name="tin" value="" />
                <div class="clr"></div>
                
                <label>Company Name</labe>
                <input type="text" name="company" value="" />
                <div class="clr"></div>
                
                <label>Company Address</label>
            </form>
        </div>
    </div>
</div>
<footer><?php $this->load->view('templates/front_end/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/front_end/includes/footer_view')?> 