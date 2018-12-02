@extends('layouts.app')

@section('content')
<main role="main" class="container">
    <?php 
    if(isset($join)) {
        echo '<div href="/home" class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Crispy guacamole!</strong>  You joined group <strong>' . $studygroup[0]->groupName . '</strong>. View them in the <a href="/home" ><u>home page</u></a>!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
    if(isset($leave)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Crispy guacamole!</strong> Successfully left group <strong>' . $studygroup[0]->groupName . '</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
    ?>
    <div class="jumbotron text-center">
        <div class="container">
            <h3 class="display-4"><?php echo $studygroup[0]->groupName; ?></h3>
            <h5><b>Day(s):</b> <?php echo $studygroup[0]->meetDay ?>&nbsp <b>Time:</b> <?php echo $studygroup[0]->meetTime ?>&nbsp <b>Location:</b> <?php echo $studygroup[0]->meetLocation ?></h5>
             <hr class="my-4">
            <p align="center">
                <?php echo $studygroup[0]->description;
                    // check if user is group member
                    if($memcheck === 0) {
                        echo '<form action="/grouphome/'.$studygroup[0]->groupID.'/join"><button class="btn btn-primary my-2">Join Group</button></form>';
                    } else {
                        echo '<form action="/grouphome/'.$studygroup[0]->groupID.'/leave"><button class="btn btn-danger my-2">Leave Group</button></form>';
                    }
                ?>
            </p>
            <button class="btn btn-primary my-2">Join Group</button>
        </div>
    </div>

    <div class="container">
        <div>
            <h3>Group Posts</h3>
        </div>
    <div class="jumbotron">
        <?php
            foreach($comments as $comment){
                echo "
                 <hr class=\"my-4\">
                <div class=\"col-sm-8\">
                    <div class=\"panel panel-white post panel-shadow\">
                        <div class=\"post-heading\">
                            <div class=\"pull-left meta\">
                                <div class=\"title h6\">
                                    <a href=\"#\"><b>".$users->where('id',$comment->id)->first()->name."</b></a>
                                    made a post.
                                </div>
                                <h6>".$comment->timeStamp ."&nbsp&nbsp&nbsp". $comment->content."</h6>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
    </div>
</div>
</main>
@endsection
