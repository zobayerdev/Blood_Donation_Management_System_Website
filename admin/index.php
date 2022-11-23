<?php
require('top.inc.php');
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="font-weight: 700; font-size: 30px; text-align: center;" class="box-title">Admin Dashboard</h4>
                        <div class="vx"><button class="button-28" role="button"><a href="users.php" style="font-size: 20px; font-weight: 700;">User List</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="user_management.php"style="font-size: 20px; font-weight: 700;">User Management</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="manage_user_management.php"style="font-size: 20px; font-weight: 700;">Add User</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="announcement.php"style="font-size: 20px; font-weight: 700;">Announcement</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="manage_announcement.php"style="font-size: 20px; font-weight: 700;">Add Announcement</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="blood_bank.php"style="font-size: 20px; font-weight: 700;">Blood Bank</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="manage_blood_bank.php"style="font-size: 20px; font-weight: 700;">Add Blood Bank</a></button></div>
                        <div class="vx"><button class="button-28" role="button"><a href="message.php"style="font-size: 20px; font-weight: 700;">Message</a></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .vx{
        padding-bottom: 20px;
    }
    .button-28 {
        appearance: none;
        background-color: white;
        border: 2px solid #1A1A1A;
        border-radius: 15px;
        box-sizing: border-box;
        color: #3B3B3B;
        cursor: pointer;
        display: inline-block;
        font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 16px;
        font-weight: 700;
        line-height: normal;
        margin: 0;
        min-height: 60px;
        min-width: 0;
        outline: none;
        padding: 30px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 100%;
        will-change: transform;
    }

    .button-28:disabled {
        pointer-events: none;
    }

    .button-28:hover {
        color: #fff;
        background-color: #E1E0AC;
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    .button-28:active {
        box-shadow: none;
        transform: translateY(0);
    }

</style>
