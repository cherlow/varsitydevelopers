@extends('layouts.dashboardlayout')
@section('headers')
<title>Dashboard </title>
<meta name="description" content="Huge community of designers, developers and creatives ready for your project.">
<meta name="keywords" content="Huge community of designers, developers and creatives ready for your project.">

@endsection
@section('content')


        
        
            <!-- Dashboard Content
            ================================================== -->
            <div class="dashboard-content-container" data-simplebar>
                <div class="dashboard-content-inner" >
                    
                    <!-- Dashboard Headline -->
                    <div class="dashboard-headline">
                        <h3>Howdy, Tom!</h3>
                        <span>We are glad to see you again!</span>
        
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs" class="dark">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Dashboard</li>
                            </ul>
                        </nav>
                    </div>
            
                    <!-- Fun Facts Container -->
                    <div class="fun-facts-container">
                        <div class="fun-fact">
                            <div class="fun-fact-text">
                                <span>Task Bids Won</span>
                                <h4>22</h4>
                            </div>
                            <div class="fun-fact-icon"><i class="icon-material-outline-gavel" style="color:#36bd78"></i></div>
                        </div>
                        <div class="fun-fact">
                            <div class="fun-fact-text">
                                <span>Jobs Applied</span>
                                <h4>4</h4>
                            </div>
                            <div class="fun-fact-icon"><i class="icon-material-outline-business-center" style="color:#b81b7f"></i></div>
                        </div>
                        <div class="fun-fact">
                            <div class="fun-fact-text">
                                <span>Reviews</span>
                                <h4>28</h4>
                            </div>
                            <div class="fun-fact-icon"><i class="icon-material-outline-rate-review" style="color:#efa80f"></i></div>
                        </div>
        
                        <!-- Last one has to be hidden below 1600px, sorry :( -->
                        <div class="fun-fact">
                            <div class="fun-fact-text">
                                <span>This Month Views</span>
                                <h4>987</h4>
                            </div>
                            <div class="fun-fact-icon"><i class="icon-feather-trending-up" style="color:#2a41e6"></i></div>
                        </div>
                    </div>

                   
                    
                
        
                    <!-- Row -->
                    <div class="row">
        
                        <!-- Dashboard Box -->
                        <div class="col-xl-6">
                            <div class="dashboard-box">
                                <div class="headline">
                                    <h3><i class="icon-material-baseline-notifications-none"></i> Notifications</h3>
                                    <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" title="Mark all as read">
                                            <i class="icon-feather-check-square"></i>
                                    </button>
                                </div>
                                <div class="content">
                                    <ul class="dashboard-box-list">
                                        <li>
                                            <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                            <span class="notification-text">
                                                <strong>Michael Shannah</strong> applied for a job <a href="#">Full Stack Software Engineer</a>
                                            </span>
                                            <!-- Buttons -->
                                            <div class="buttons-to-right">
                                                <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
                                            <span class="notification-text">
                                                <strong>Gilber Allanis</strong> placed a bid on your <a href="#">iOS App Development</a> project
                                            </span>
                                            <!-- Buttons -->
                                            <div class="buttons-to-right">
                                                <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
                                            <span class="notification-text">
                                                Your job listing <a href="#">Full Stack Software Engineer</a> is expiring
                                            </span>
                                            <!-- Buttons -->
                                            <div class="buttons-to-right">
                                                <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                            <span class="notification-text">
                                                <strong>Sindy Forrest</strong> applied for a job <a href="#">Full Stack Software Engineer</a>
                                            </span>
                                            <!-- Buttons -->
                                            <div class="buttons-to-right">
                                                <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="notification-icon"><i class="icon-material-outline-rate-review"></i></span>
                                            <span class="notification-text">
                                                <strong>David Peterson</strong> left you a <span class="star-rating no-stars" data-rating="5.0"></span> rating after finishing <a href="#">Logo Design</a> task
                                            </span>
                                            <!-- Buttons -->
                                            <div class="buttons-to-right">
                                                <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
        
                        <!-- Dashboard Box -->
                        <div class="col-xl-6">
                            <div class="dashboard-box">
                                <div class="headline">
                                    <h3><i class="icon-material-outline-question-answer"></i> Messages</h3>
                                </div>
                                <div class="content">
                                    <div class="messages-inbox">
            
                                                <ul>
                                                    <li><a href="#"><div class="message-avatar"><i class="status-icon status-online"></i><img src="images/user-avatar-small-03.jpg" alt=""></div> <div class="message-by"><div class="message-by-headline"><h5>David Peterson</h5> <span>4 hours ago</span></div> <p>Thanks for reaching out. I'm quite busy right now on many</p></div></a></li> 
                                                    <li class="active-message"><a href="#"><div class="message-avatar"><i class="status-icon status-offline"></i><img src="images/user-avatar-small-02.jpg" alt=""></div> <div class="message-by"><div class="message-by-headline"><h5>Sindy Forest</h5> <span>Yesterday</span></div> <p>Hi Tom! Hate to break it to you but I'm actually on vacation</p></div></a></li>
                                                     <li><a href="#"><div class="message-avatar"><i class="status-icon status-offline"></i><img src="images/user-avatar-placeholder.png" alt=""></div> <div class="message-by"><div class="message-by-headline"><h5>Sebastiano Piccio</h5> <span>2 days ago</span></div> <p>Hello, I want to talk about my project if you don't mind!</p></div></a></li> 
                                                     <li><a href="#"><div class="message-avatar"><i class="status-icon status-online"></i><img src="images/user-avatar-placeholder.png" alt=""></div> <div class="message-by"><div class="message-by-headline"><h5>Marcin Kowalski</h5> <span>2 days ago</span></div> <p>Yes, I received payment. Thanks for cooperation!</p></div></a></li></ul></div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                    <!-- Row / End -->
        
                    <!-- Footer -->
                    <div class="dashboard-footer-spacer"></div>
                    <div class="small-footer margin-top-15">
                        <div class="small-footer-copyrights">
                            © 2018 <strong>Hireo</strong>. All Rights Reserved.
                        </div>
                        <ul class="footer-social-links">
                            <li>
                                <a href="#" title="Facebook" data-tippy-placement="top">
                                    <i class="icon-brand-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Twitter" data-tippy-placement="top">
                                    <i class="icon-brand-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Google Plus" data-tippy-placement="top">
                                    <i class="icon-brand-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="LinkedIn" data-tippy-placement="top">
                                    <i class="icon-brand-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Footer / End -->
        
                </div>
            </div>
            <!-- Dashboard Content / End -->
       
        
        
        <!-- Apply for a job popup
        ================================================== -->
        <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
        
            <!--Tabs -->
            <div class="sign-in-form">
        
                <ul class="popup-tabs-nav">
                    <li><a href="#tab">Add Note</a></li>
                </ul>
        
                <div class="popup-tabs-container">
        
                    <!-- Tab -->
                    <div class="popup-tab-content" id="tab">
                        
                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <h3>Do Not Forget 😎</h3>
                        </div>
                            
                        <!-- Form -->
                        <form method="post" id="add-note">
        
                            <select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
                                <option>Low Priority</option>
                                <option>Medium Priority</option>
                                <option>High Priority</option>
                            </select>
        
                            <textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>
        
                        </form>
                        
                        <!-- Button -->
                        <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>
        
                    </div>
        
                </div>
            </div>
        </div>
        <!-- Apply for a job popup / End -->
@endsection

