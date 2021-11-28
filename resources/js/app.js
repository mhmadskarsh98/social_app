require('./bootstrap');

window.Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        alert(notification.body);
    });

window.Echo.private('PostActivity.' + userId)
    .listen('.NewComment',(data) => {
        jQuery(`.comment-list-${data.comment.post_id}`).append(`<li>
                                                        <div class="comment-list">
                                                            <div class="comment">
                                                                <div class="usy-dt">
                                                                    <img src=" ${data.user.profile.avatar_url} "
                                                                        alt="123" height="42" width="37">
                                                                    <div class="usy-name">
                                                                        <h3>${data.user.profile.full_name}
                                                                        </h3>
                                                                        <span><img
                                                                                src="/front/images/clock.png"
                                                                                alt="">${data.comment.created_at}</span>
                                                                    </div>
                                                                </div><p>${data.comment.content}</p> </div></div></li>`)
    });

window.Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        alert(notification.body);
    });
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


