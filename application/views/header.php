<body>
    <header>
        <div class="header">
            <div class="header-navtitle">
                <p><a>E-Learning</a></p>
            </div>
            <div class="header-nav">
                <nav>
                    <ul>
                        <li><a href="<?php base_url() . 'user/user_logout'?>.">Logout</a></li>
                        <li><a>Hi! <?php echo $this->session->userdata("username") ?></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>