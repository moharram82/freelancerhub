@extends('freelancer.partials.layout')

@section('title') Messages @endsection

@section('freelancer-contents')

    <h2 style="color: #959ea9; font-size: 24px; font-weight: 400;">Messages</h2>

    <div class="row">
        <div class="col-md-3 contacts">
            <div class="contact selected clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/1.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
            <div class="contact clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/2.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
            <div class="contact clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/3.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
            <div class="contact clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/default.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
            <div class="contact clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/5.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
            <div class="contact clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/6.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
            <div class="contact clearfix">
                <img class="rounded-circle" src="{{ BASEURL }}/img/users/7.jpg" alt="Profile Picture">
                <h4>{{ 'Contact Name' }}</h4>
            </div>
        </div>
        <div class="col-md-9 messages">
            <div class="messages-box">
                <div class="message sender clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/1.jpg" alt="Profile Picture">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda consequuntur cupiditate dicta doloribus error ex exercitationem impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
                <div class="message receiver clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/7.jpg" alt="Profile Picture">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda consequuntur cupiditate dicta doloribus error ex exercitationem impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
                <div class="message sender clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/1.jpg" alt="Profile Picture">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda consequuntur cupiditate dicta doloribus error ex exercitationem impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
                <div class="message sender clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/1.jpg" alt="Profile Picture">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda consequuntur cupiditate dicta doloribus error ex exercitationem impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
                <div class="message sender clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/1.jpg" alt="Profile Picture">
                    <div class="message-body">
                        impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
                <div class="message sender clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/7.jpg" alt="Profile Picture">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda consequuntur cupiditate dicta doloribus error ex exercitationem impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
                <div class="message receiver clearfix">
                    <img class="rounded-circle" src="{{ BASEURL }}/img/users/7.jpg" alt="Profile Picture">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda consequuntur cupiditate dicta doloribus error ex exercitationem impedit maiores nam necessitatibus pariatur praesentium ratione repellat saepe sint suscipit tempore voluptatibus.
                    </div>
                    <p class="timing">2 Nov 2018 18:10:20</p>
                </div>
            </div>
            <div class="send-box">
                <input type="text" name="message" id="message" value="" placeholder="message">
                <button class="btn btn-primary btn-block" name="send">Send</button>
            </div>
        </div>
    </div>

@endsection
