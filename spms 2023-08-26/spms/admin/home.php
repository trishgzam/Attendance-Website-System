<?php
$bg_color = 'brown';
echo "<body style ='background-color: $bg_color; '>";
?>

<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("123.jpg");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .banner img {
        max-width: 100%;
        height: auto;
    }

    .time-date-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Adjust as needed to center vertically */
    }

    .time-date-content {
        text-align: center;
    }
</style>

<marquee class="moving-text" behavior="scroll" direction="right">
<h3 style="color: white; text-shadow: 2px 2px 2px black;">Welcome to MCSI Payroll Management System</h3>
</marquee>
<div class="time-date-content">
<style>

     #time_display, #date_display {
    display: center;
    margin: 0 auto;
    text-align: center;
  }
  #time_display {
    color: white; /* Change this to your desired color */
  }
</style>
<style>
  #date_display {
    color: yellow; /* Change this to your desired color */
    text-shadow: 2px 2px 2px black;
  }
</style>
<style>
  #time_display {
    color: whitesmoke; /* Change this to your desired color for time */
    text-shadow: 2px 2px 2px black;
    font-family: Arial, Helvetica, sans-serif; /* Change this to your desired font */
    font-size: 50px; /* Change this to your desired font size */
  }

  /* You can keep the existing CSS for #date_display here */

</style>
    <h2><b><span id="time_display"><?php echo date("h:i A") ?></span></b></h2>
    <h5><b><span id="date_display"><?php echo date("M d, Y") ?></span></b></h5>
    <input type="hidden" id="date_time" value="">
</div>
<script>
    function updateTime() {
        const timeDisplay = document.getElementById("time_display");
        const dateDisplay = document.getElementById("date_display");

        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();

        const formattedTime = `${formatTimeComponent(hours)}:${formatTimeComponent(minutes)}:${formatTimeComponent(seconds)}`;
        timeDisplay.textContent = formattedTime;
        
        const formattedDate = `${formatDateComponent(now.getMonth() + 1)} ${formatDateComponent(now.getDate())}, ${now.getFullYear()}`;
        dateDisplay.textContent = formattedDate;
    }

    function formatTimeComponent(component) {
        return component.toString().padStart(2, '0');
    }

    function formatDateComponent(component) {
        return component.toString().padStart(2, '0');
    }

    // Update time every second
    setInterval(updateTime, 1000);

    // Call update function immediately to set initial time
    updateTime();
</script>
<hr>
<div class="col-12">
    <div class= "row gx-3 row-cols-4">
        <div class="col">
            <div class="card">
            <div class="card-body" style="background-color: #B0E0E6;">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-building fs-3 text-success"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <style>
                        .fs-5 {
                            font-family: 'Lucida Sans', sans-serif; /* Change this to your desired font */
                            font-size: 18px; /* Adjust the font size as needed */
                            font-weight: bold;
                        }

                        .fs-6 {
                            font-family: 'Times New Roman', serif; /* Change this to your desired font */
                            font-size: 16px; /* Adjust the font size as needed */
                            font-weight: bold;
                            text-align: end;
                        }
                        </style>

                        <style>
                            .text-color-change {
                                color: white; /* Change this to your desired text color */
                                text-shadow: 2px 2px 2px black;
                            }
                            </style>
                            <head>
                            <style>
                                @keyframes fadeIn {
                                    0% { opacity: 0; transform: translateY(-10px); }
                                    100% { opacity: 1; transform: translateY(0); }
                                }

                                .text-color-change {
                                    animation: fadeIn 1s ease-in-out; /* Apply the fadeIn animation */
                                }
                            </style>
                        </head>
                            <div class="fs-5 text-color-change"><b>Departments</b></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                                $department = $conn->query("SELECT count(department_id) as `count` FROM `department_list` where status = 1 ")->fetch_array()['count'];
                                echo $department > 0 ? number_format($department) : 0 ;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body" style="background-color: #B0E0E6;">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-th-list fs-3 text-primary"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <style>
                            .text-color-change1 {
                                color: 	white; /* Change this to your desired text color */
                                text-shadow: 2px 2px 2px black;
                                
                            }
                            </style>
                            <head>
                            <style>
                                @keyframes fadeIn {
                                    0% { opacity: 0; transform: translateX(-10px); }
                                    100% { opacity: 1; transform: translateX(0); }
                                }

                                .text-color-change1 {
                                    animation: slideInFromLeft 1s ease-in-out; /* Apply the slideInFromLeft animation */
                                }
                            </style>
                        </head>
                        <head>
                        <style>
                            @keyframes slideInFromLeft {
                                0% { opacity: 0; transform: translateX(-10px); }
                                100% { opacity: 1; transform: translateX(0); }
                            }

                            .text-color-change1 {
                                animation: slideInFromLeft 1s ease-in-out; /* Apply the slideInFromLeft animation */
                            }
                        </style>
                    </head>
                            <div class="fs-5 text-color-change1"><b>Designations</b></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                                $designation = $conn->query("SELECT count(designation_id) as `count` FROM `designation_list` where status = 1 ")->fetch_array()['count'];
                                echo $designation > 0 ? number_format($designation) : 0 ;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body" style="background-color: #B0E0E6;">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-user-tie fs-3 text-warning"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <style>
                            .text-color-change2 {
                                color: 	white; /* Change this to your desired text color */
                                text-shadow: 2px 2px 2px black;
                            }
                            </style>
                            <head>
                            <style>
                                @keyframes fadeIn {
                                    0% { opacity: 0; transform: translate(-10px); }
                                    100% { opacity: 1; transform: translate(0); }
                                }

                                .text-color-change2 {
                                    animation: fadeIn 1s ease-in-out; /* Apply the fadeIn animation */
                                }
                            </style>
                        </head>
                            <div class="fs-5 text-color-change2"><b>Employee's</b></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                                $employees = $conn->query("SELECT count(employee_id) as `count` FROM `employee_list` where status = 1 ")->fetch_array()['count'];
                                echo $employees > 0 ? number_format($employees) : 0 ;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                 <div class="card-body" style="background-color: #B0E0E6;">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-users fs-3 text-primary"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <style>
                            .text-color-change3 {
                                color: 	white; /* Change this to your desired text color */
                                text-shadow: 2px 2px 2px black;
                            }
                            </style>
                            <head>
                            <style>
                                @keyframes fadeIn {
                                    0% { opacity: 0; transform: translateY(-10px); }
                                    100% { opacity: 1; transform: translate(0); }
                                }
                                .text-color-change3 {
                                    animation: fadeIn 1s ease-in-out; /* Apply the slideInLeft animation */
                                }
                            </style>
                        </head>
                            <div class="fs-5 text-color-change3"><b>User's</b></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                                $admin = $conn->query("SELECT count(admin_id) as `count` FROM `admin_list`")->fetch_array()['count'];
                                echo $admin > 0 ? number_format($admin) : 0 ;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.restock').click(function(){
            uni_modal('Add New Stock for <span class="text-primary">'+$(this).attr('data-name')+"</span>","manage_stock.php?pid="+$(this).attr('data-pid'))
        })
        $('table#inventory').dataTable()
    })
</script>

