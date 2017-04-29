@extends('templates.hub')

@section('main')
<div class= "container max-height">
    <div class="container section-white max-height">
        <div class="sideleft max-height">
            <div class="logo-hub">
                    <!--Add Logo here-->
                    <p class="logo">Vigor</p>
                    <!---->
            </div>
            <div class="rank">
                    <!--Add User Rank Here-->

                    <!---->
            </div>
            <div class="profile-info">
                <div class="user-image">
                <!--Pull user image and put here-->

                <!---->
            </div>
        </div>
            <div class="btn-group-vertical max-width" role="group" aria-label="...">
                <button type="button" class="btn btn-default btn-sidebar">
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                <br>Day</button>
                <button type="button" class="btn btn-default btn-sidebar">
                    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                <br>Progress</button>
                <button type="button" class="btn btn-default btn-sidebar">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <br>Schedule</button>
                <button type="button" class="btn btn-default btn-sidebar">
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                <br>Task</button>
                <button type="button" class="btn btn-default btn-sidebar">
                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                <br>FAQ</button>
            </div>
        </div>
            <div class="body">
                <div class="section-gray large-width">
                <!--Put Week chart here-->
                 
                 <!---->
                </div>
                <div class="section-gray small-width">
                    <a href="#"> Settings </a> <p> | </p> <a href="#"> Settings </a>
                </div>
                <div class= "btn-data max-width" role="group" aria-label="...">
                    <button type="button" class="btn btn-default btn-data btn-no-hover">
                        Days Completed:
                        <br>
                        <!--Grab User Data-->
                        <p>3</p>
                        <!---->
                    </button>
                </div>
                <div class= "btn-data max-width" role="group" aria-label="...">
                    <button type="button" class="btn btn-default btn-data btn-no-hover">
                        Sessions Completed:
                        <br>
                         <!--Grab User Data-->
                         <p>5</p>
                        <!---->
                    </button>
                </div>
                <div class= "btn-data max-width" role="group" aria-label="...">    
                    <button type="button" class="btn btn-default btn-data btn-no-hover">
                        Longest Sessions Streak:
                        <br>
                         <!--Grab User Data-->
                         <p>2</p>
                        <!---->
                    </button>
                </div>
                <div class= "btn-data max-width" role="group" aria-label="...">    
                    <button type="button" class="btn btn-default btn-data btn-no-hover">
                        Total Minutes:
                        <br>
                         <!--Grab User Data-->
                         <p>3,600</p>
                        <!---->
                    </button>
                </div>
                <div class= "section-white max-width chart-holder">
                     <form >
                        <fieldset>
                            <legend></legend>
                            <div class="center">
                                <label>Session:</label>
                                <input type="text" placeholder="Your Activity..." class="table-width-large gray-text-box">
                            </div>
                            <div class="table-third-first">
                                <label>On:</label>
                                <input type="text" placeholder="Day..." class="table-width-third gray-text-box">
                            </div>
                            <div class="table-third-second">
                                <label>At:</label>
                                <input type="text" placeholder="Time..." class="table-width-third gray-text-box">
                            </div>
                            <div class= "table-third-last">
                                <label>For:</label>
                                <input type="text" placeholder="Length..." class="table-width-last gray-text-box">
                            </div>
                            <div class="center">
                                <label><label>
                                <input type="text" placeholder="Add a note..." class="table-width-large-no-label gray-text-box">
                                <button type="submit" class="btn btn-default blue-button">Submit</button>
                            </div>
                        </form>
                </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@stop