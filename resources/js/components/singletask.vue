<template>
    <div>
        <!-- Titlebar
        ================================================== -->
        <div class="single-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-page-header-inner">
                            <div class="left-side">
                            <div class="header-image"><a href="javascript:void(0)"><img :src="this.taskdata.employer.avatar" alt=""></a></div>
                                <div class="header-details">
                                <h3>{{this.taskdata.title}}</h3>
                                    <h5>About the Employer</h5>
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="icon-material-outline-business"></i> {{this.taskdata.employer.name}}</a></li>
                                        <li><div class="star-rating" data-rating="5.0"></div></li>
                                        <li><img class="flag" src="/images/flags/de.svg" alt=""> {{this.taskdata.employer.location}}</li>
                                        <li><div class="verified-badge-with-title">Verified</div></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right-side">
                                <div class="salary-box">
                                    <div class="salary-type">Project Budget</div>
                                    <div class="salary-amount">${{this.taskdata.min_budget}} - ${{this.taskdata.max_budget}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Page Content
        ================================================== -->
        <div class="container">
            <div class="row">
                
                <!-- Content -->
                <div class="col-xl-8 col-lg-8 content-right-offset">
                    
                    <!-- Description -->
                    <div class="single-page-section">
                        <h3 class="margin-bottom-25">Project Description</h3>
                       {{this.taskdata.details}}
                    </div>
        
                    <!-- Atachments -->
                    <div class="single-page-section">
                        <h3>Attachments</h3>
                        <div class="attachments-container">
                            <a v-for="attachment in this.taskdata.attachments" :key="attachment.id" :href="'/storage/attachments/'+attachment.link" class="attachment-box ripple-effect"><span>{{attachment.name}}</span><i>{{attachment.type}}</i></a>
                        </div>
                    </div>
        
                    <!-- Skills -->
                    <div class="single-page-section">
                        <h3>Skills Required</h3>
                        <div class="task-tags">
                            <span v-for="skill in this.taskdata.skills" :key="skill.id">{{skill.skill}}</span>
                         
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <!-- Freelancers Bidding -->
                    <div class="boxed-list margin-bottom-60">
                        <div class="boxed-list-headline">
                            <h3><i class="icon-material-outline-group"></i> Freelancers Bidding</h3>
                        </div>
                        <ul class="boxed-list-ul">
                            <li>
                                <div class="bid">
                                    <!-- Avatar -->
                                    <div class="bids-avatar">
                                        <div class="freelancer-avatar">
                                            <div class="verified-badge"></div>
                                            <a href="single-freelancer-profile.html"><img src="/images/user-avatar-big-01.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="bids-content">
                                        <!-- Name -->
                                        <div class="freelancer-name">
                                            <h4><a href="single-freelancer-profile.html">Tom Smith <img class="flag" src="/images/flags/gb.svg" alt="" title="United Kingdom" data-tippy-placement="top"></a></h4>
                                            <div class="star-rating" data-rating="4.9"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Bid -->
                                    <div class="bids-bid">
                                        <div class="bid-rate">
                                            <div class="rate">$4,400</div>
                                            <span>in 7 days</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
        
                </div>
                
        
                <!-- Sidebar -->
                <div class="col-xl-4 col-lg-4">
                    <div class="sidebar-container">
        
                        <div class="countdown green margin-bottom-35">{{this.taskdata.created}}</div>
        
                        <div class="sidebar-widget">
                            <div class="bidding-widget">
                                <div class="bidding-headline"><h3>Bid on this job!</h3></div>
                                <div class="bidding-inner" v-if="auth">
        
                                    <!-- Headline -->
                                    <span class="bidding-detail">Set your <strong>bid amount</strong></span>
        
                                    <!-- Price Slider -->
                                    <!-- <div class="bidding-value">$<span id="biddingVal"></span></div> -->
                                    <!-- <input class="bidding-slider" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min="1" data-slider-max="10" data-slider-value="auto" data-slider-step="1" data-slider-tooltip="hide"/> -->
                                      <div class="qtyButtons">
                                                <div class="qtyDec" @click="bidamount > 1 ? bidamount--: 1"></div>
                                                <input type="number" min="1" name="qtybid" v-model="bidamount">
                                                <div class="qtyInc" @click="bidamount++"></div>
                                            </div>
                                    <!-- Headline -->
                                    <span class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>
        
                                    <!-- Fields -->
                                    <div class="bidding-fields">
                                        <div class="bidding-field">
                                            <!-- Quantity Buttons -->
                                            <div class="qtyButtons">
                                                <div class="qtyDec" @click="deliverytime > 1 ?deliverytime--: 1"></div>
                                                <input type="number" name="qtyInput" v-model="deliverytime">
                                                <div class="qtyInc" @click="deliverytime++"></div>
                                            </div>
                                        </div>
                                        <div class="bidding-field">
                                            <select class="selectpicker default" v-model="description">
                                                <option selected>Days</option>
                                                <option>Hours</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <!-- Button -->
                                    <button id="snackbar-place-bid" class="button ripple-effect move-on-hover full-width margin-top-30" @click="placebid"><span>Place a Bid</span></button>
        
                                </div>
                                <!-- <div v-if="!auth" class="bidding-signup">Sign up to bid on this project <a href="/login" class="register-tab sign-in">Sign Up</a></div> -->
                                <div v-if="!auth">
                                    <div class="login-register-page">
                        <!-- Welcome Text -->
                        <div class="welcome-text">
                           
                        <span>Don't have an account? <a href="/register">Sign Up!</a></span>
                        </div>
                            
                        <!-- Form -->
                        <form action="/login" method="POST" id="login-form">
                            <input type="hidden" name="_token" :value="token"/>
                            <div class="input-with-icon-left">
                                <i class="icon-material-baseline-mail-outline"></i>
                                <input type="email" class="input-text with-border" name="email" id="emailaddress" placeholder="Email Address" required/>
                            </div>
        
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-lock"></i>
                                <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <a href="#" class="forgot-password">Forgot Password?</a>

                                <!-- Button -->
                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
                        </form>
                        
                    
                        
                        <!-- Social Login -->
                        <div class="social-login-separator"><span>or</span></div>
                        <div class="social-login-buttons">
                            <button class="github-login ripple-effect"><i class="icon-brand-github"></i> Log In via Github</button>
                            <button class="google-login ripple-effect"><i class="icon-line-awesome-envelope-o"></i> Log In via Google</button>
                        </div>
                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Sidebar Widget -->
                        <div class="sidebar-widget">
                            <h3>Bookmark or Share</h3>
        
                            <!-- Bookmark Button -->
                            <button class="bookmark-button margin-bottom-25">
                                <span class="bookmark-icon"></span>
                                <span class="bookmark-text">Bookmark</span>
                                <span class="bookmarked-text">Bookmarked</span>
                            </button>
        
                            <!-- Copy URL -->
                            <div class="copy-url">
                                <input id="copy-url" type="text" value="" class="with-border">
                                <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
                            </div>
        
                            <!-- Share Buttons -->
                            <div class="share-buttons margin-top-25">
                                <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                                <div class="share-buttons-content">
                                    <span>Interesting? <strong>Share It!</strong></span>
                                    <ul class="share-buttons-icons">
                                        <li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                                        <li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                        <li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
                                        <li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
        
            </div>
        </div>
        
    </div>
</template>
<script>
export default {
    name:"singletask",
    props:{
        task:String,
        auth:String,
    },
    data(){
        return{
 taskdata:{},
 token:document.head.querySelector('meta[name="csrf-token"]').content,
 bidamount:'1',
 deliverytime:'1',
 description:'Days',
        }
    },
    created(){
        this.taskdata=JSON.parse(this.task)
    },
    methods:{
        placebid(){
            let formData= new FormData();
            formData.append('amount',this.bidamount);
            formData.append('delivery',this.deliverytime);
            formData.append('desc',this.description);
            formData.append('task',this.taskdata.slug);

            axios.post('/api/placebid',formData)
            .then((res)=>{
                if(res.data.success){
                      toast.fire({
                        type:'success',
                        title:res.data.success,
                    });

                     let origin=window.location.origin
            window.location.replace(origin+'/mybids')
                }
                else{
                    toast.fire({
                        type:'error',
                        title:res.data.error,
                    });
                }
            }).catch((e)=>console.log(e))

        }
    }

}
</script>
<style scoped>

</style>
