<?php
include("../includes/common.php");
if(empty($_SESSION['ytidc_user']) && empty($_SESSION['ytidc_pass'])){
  	@header("Location: ./login.php");
     exit;
}else{
  	$username = daddslashes($_SESSION['ytidc_user']);
  	$password = daddslashes($_SESSION['ytidc_pass']);
  	$user = $DB->query("SELECT * FROM `ytidc_user` WHERE `username`='{$username}' AND `password`='{$password}'");
  	if($user->num_rows != 1){
      	@header("Location: ./login.php");
      	exit;
    }else{
      	$user = $user->fetch_assoc();
    }
}
$title = "公告列表";
include("./head.php");
$result = $DB->query("SELECT * FROM `ytidc_notice`");
?>

            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">公告列表</span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">公告列表</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>标题</th>
                                              	<th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          while($row = $result->fetch_assoc()){
                                            echo '<tr>
                                                <th scope="row">'.$row['id'].'</th>
                                                <td>'.$row['title'].'</td>
                                                <td><a href="./noticedetail.php?id='.$row['id'].'" class="btn btn-primary">查看</a></td>
                                            </tr>';
                                          }
                                          ?>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

include("./foot.php");
?>