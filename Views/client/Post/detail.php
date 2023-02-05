<?php 
    require(ROOT. '/Views/client/_layout/header.php');
    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];

    }
?>

<!-- Phần thân -->
<div class="wrapper">
  <div class="container">
    <div class="row">
      <!-- Main wrapper -->
      <div class="col-md-8 col-sm-12 col-12 clear-left">
        <div class="main-wrapper">
          <h2 class="widget-title">
            <span><?= $post[1] ?></span>
          </h2>
          <div class="post-info">
            <div class="info-left">
              <div class="info-authorImage">
                <img alt="Hiếu Dev" class="" src="Assets/upload/user_avatar/<?= $post[11] ?>">
              </div>
              <div class="info-author">
                <span class="info-authorName">
                  <span class="fn">
                    <a class="g-profile" href="#" rel="nofollow noreferrer" target="_blank" title="author profile">
                      <?= $post[10] ?> (<?= $post[9] ?>)
                    </a>
                  </span>
                </span>
                <span class="info-datePost">
                  <time class="published">
                    <?= $post[6] ?>
                  </time>
                  <a class="comments-bubble" href="#">
                    0 comments
                  </a>
                </span>
              </div>
            </div>
            <div class="info-right">
              <div class="bookmarkThis">
                <a href="javascript:void(0)" onclick="return addFavorite(this);" title="Bookmark this page">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z">
                    </path>
                  </svg>
                </a>
              </div>
              <div class="facebookThis">
                <a href="https://www.facebook.com/sharer.php?u=https://www.quochieu.com/2021/01/ui-design-share-form-dang-ky-dang-nhap.html" onclick="window.open(this.href,&quot;sharer&quot;,&quot; toolbar=0,status=0,width=626,height=436&quot;);return false;" rel="nofollow noreferrer" title="Share to Facebook">
                  <svg viewBox="0 0 32 32">
                    <path d="M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5h8a1,1,0,0,0,1-1V20a1,1,0,0,0-1-1H15V17h1a1,1,0,0,0,1-1V12.5A2.5,2.5,0,0,1,19.5,10H22v2H21a2,2,0,0,0-2,2v2a1,1,0,0,0,1,1h1.72l-.5,2H20a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V21h1a1,1,0,0,0,1-.76l1-4a1,1,0,0,0-.18-.86A1,1,0,0,0,23,15H21V14h2a1,1,0,0,0,1-1V9a1,1,0,0,0-1-1H19.5A4.51,4.51,0,0,0,15,12.5V15H14a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1h1v6H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3V24a3,3,0,0,1-3,3H20a1,1,0,0,0,0,2h4a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Z">
                    </path>
                  </svg>
                </a>
              </div>
              <div class="twitterThis">
                <a href="https://twitter.com/share?url=https://www.quochieu.com/2021/01/ui-design-share-form-dang-ky-dang-nhap.html&amp;text=UI Design - Share form Đăng Ký Đăng Nhập trend 2021 cực đẹp (by: @username) " onclick="window.open(this.href,&quot;   sharer&quot;   ,&quot;   toolbar=0,status=0,width=626,height=436&quot;   );   return false;" rel="nofollow noreferrer" title="Share to Twitter">
                  <svg viewBox="0 0 32 32">
                    <path d="M28.77,8.11a.87.87,0,0,0-.23-.2A4.69,4.69,0,0,0,29,6.54a1,1,0,0,0-.44-1,1,1,0,0,0-1.1,0,6.42,6.42,0,0,1-2.28.92,6.21,6.21,0,0,0-7.08-1A6.07,6.07,0,0,0,15,12.2a1,1,0,0,0,2-.4A4.08,4.08,0,0,1,19,7.28a4.24,4.24,0,0,1,5.12,1,1,1,0,0,0,.88.28l.25,0a1,1,0,0,0,.34,1.62,1,1,0,0,0-.36.88,13.07,13.07,0,0,1-4.89,11.24A12.75,12.75,0,0,1,7.69,24.61a9.06,9.06,0,0,0,4.54-2.18,1,1,0,0,0,.15-1.09,1,1,0,0,0-.93-.57,4,4,0,0,1-3-1.39,3.63,3.63,0,0,0,1-.35A1,1,0,0,0,10,18a1,1,0,0,0-.76-.84,4.42,4.42,0,0,1-3-2.48c.24,0,.48.05.74.06a1,1,0,0,0,1-.62A1,1,0,0,0,7.67,13C6,11.48,5.59,9.85,5.83,8.7a13.88,13.88,0,0,0,7,4,1,1,0,1,0,.38-2A12.1,12.1,0,0,1,6.39,6.31a1,1,0,0,0-.75-.38,1,1,0,0,0-.78.33,5.34,5.34,0,0,0-.31,6l-.09,0a1,1,0,0,0-.52.81,5.84,5.84,0,0,0,1.95,4.47,1,1,0,0,0-.18,1,6.63,6.63,0,0,0,3.18,3.57A13.89,13.89,0,0,1,4,23a1,1,0,0,0-.5,1.86A16.84,16.84,0,0,0,12,27.35a15.16,15.16,0,0,0,9.6-3.57,15.12,15.12,0,0,0,5.69-12.42,4.62,4.62,0,0,0,1.62-2.25A1,1,0,0,0,28.77,8.11Z">
                    </path>
                  </svg>
                </a>
              </div>
              <div class="shareThis">
                <label for="offshare-menu">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="5" r="3">
                    </circle>
                    <circle cx="6" cy="12" r="3">
                    </circle>
                    <circle cx="18" cy="19" r="3">
                    </circle>
                    <line x1="8.59" x2="15.42" y1="13.51" y2="17.49">
                    </line>
                    <line x1="15.41" x2="8.59" y1="6.51" y2="10.49">
                    </line>
                  </svg>
                </label>
              </div>
            </div>
          </div>

          <div class="jd-content">
          <?= $post[4] ?>
          </div>

          <div class="byline post-labels">
          <?php foreach($dataListTags as $tag) { ?>
            <a href="?c=Post&a=Tag&id=<?=$tag[1]?>" rel="tag">
              <?=$tag[0]?>
            </a>
            <?php } ?>
          </div>


          <div class="postAuthor">
            <div class="authorImage">
              <div class="authorImg">
                <img alt="Hiếu Dev" class="" src="Assets/upload/company_image/<?= $post[12] ?>">
              </div>
            </div>
            <div class="authorInfo">
              <div class="author-name">
                <span><?= $post[9] ?>
                </span>
              </div>
              <div class="author-desc">
              <?= $post[13] ?>
                <a href="#">...Xem thêm
                </a>
              </div>
            </div>
          </div>

          <div class="comment-wrapper">
          <?php if(isset($_SESSION['login_user'])) { ?>
          <form method="post" action="?c=Post&a=Comment">
                  <p>Comments as <b><?= $user_id[1] ?></b></p>
                  <div class="feedback-main">
                  <input type="hidden" name="UserId" readonly value="<?= $user_id[0] ?>">
                  <input type="hidden" name="PostId" readonly value="<?= $post[0] ?>">
                  <textarea name="Content" rows="5"></textarea>
                  <input type="submit" value="Comment">
                  </div>
                </form>
                <?php } else { ?> Hãy là người bình luận đầu tiên. <a href="?c=User&a=DangNhapUser">Đăng nhập</a> hoặc <a href="?c=User&a=DangKyUser">Đăng ký</a> tài khoản. <?php } ?>
          </div>
          <div id="comment-holder">
            <div class="comment-thread toplevel-thread">
              <ol id="top-ra">
              <?php foreach($dataListComment as $comment) { ?>
                <li class="comment">
                  <div class="avatar-image-container">
                    <img src="Assets/upload/user_avatar/<?=$comment[8]?>" alt="">
                  </div>
                  <div class="comment-block">
                    <div class="comment-header">
                      <cite class="user">
                        <span><?=$comment[7]?>
                        </span>
                      </cite>
                      <span class="icon user ">
                      </span>
                      <span class="datetime secondary-text">
                        <a rel="nofollow" href="#"><?=$comment[3]?>
                        </a>
                      </span>
                    </div>
                    <p class="comment-content"><?=$comment[2]?>
                    </p>
                  
                  </div>

                </li>
                <?php } ?>

            </div>
          </div>
        </div>
      </div>
 <!-- Sidebar -->
 <div class="col-md-4 col-sm-12 col-12 clear-right">
      

     
      <?php 
    require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>

<style>
.post-info .info-authorImage{width:36px;height:36px}
.post-info .info-author{font-size:11px}
.post-info .info-author .info-authorName{font-size:13px}
.post-info .info-author .info-datePost{margin-top:2px}
.post-info{display:flex;display:-webkit-flex;justify-content:space-between;-webkit-justify-content:space-between;align-items:center;-webkit-align-items:center;}
.blog-posts article img{border-radius:3px;display:inline-block;width: 95%!important;} .info-authorImage img { border-radius: 50%; display: inline-block; width: 100%!important; } .info-right div { width: 16px; text-align: right; float: right; margin-left: 9px; } .info-right { width: 50%; float: left; } .info-left { width: 50%; float: left; } .post-info .info-authorImage { width: 36px; height: 36px; } .info-authorImage img { border-radius: 50%; display: inline-block; width: 100%!important; }
.post-info .info-authorImage { margin-right: 15px; } .post-info .info-authorImage { margin-right: 15px; float: left; } span.info-authorName a { display: block; color: #4d4d4d; } span.info-datePost time, span.info-datePost a { color: #8f8f8f; }
.byline.post-labels a:not(:last-child) { margin-right: 7px; margin-bottom: 7px; } .byline.post-labels a { display: inline-block; padding: 5px 15px; position: relative; line-height: 20px; border-radius: 5px; background-color: rgba(0,0,0,.05); color: rgba(0,0,0,.65); } .byline.post-labels { display: flex; display: -webkit-flex; flex-wrap: wrap; -webkit-flex-wrap: wrap; align-items: flex-start; -webkit-align-items: flex-start; font-size: 13px; width: calc(100% - 81px); padding-right: 15px; }

.postAuthor{display:table;width:100%;margin-bottom:40px}
..postAuthor > div{display:table-cell;vertical-align:middle;}
.postAuthor > div:not(:first-child){padding-left:20px}
.postAuthor .authorImage{width:80px;}
.postAuthor .authorImage .authorImg{width:80px;height:80px;border-radius:50%;overflow:hidden}
.postAuthor .authorFollow{text-align:right}
.postAuthor .authorFollow a{display:inline-block;padding:7px 15px;border:1px solid #e94c39;border-radius:5px;font-size:13px}
.postAuthor .authorFollow a:hover{border-color:#989b9f}
.postAuthor .authorFollow a:before{content:'View';display:inline-block;margin-right:4px}
.postAuthor img{border-radius:50%;}
.postAuthor .author-name{font-size:16px;font-weight:600;}
.postAuthor .author-name:before{content:'About Our Company';display:block;font-size:12px;font-weight:400;margin-bottom:2px;color:#989b9f}
.postAuthor .author-name span{display:inline-block;color:#09204C}
.postAuthor .author-desc{font-size:12px;margin-top:7px;} 

.authorImage img { border-radius: 50%; width: 80px; height: 80px; } .authorImage { float: left; margin-right: 25px; }
.postAuthor { display: table; width: 100%; margin-bottom: 40px; margin-top: 15px; border-top: 1px solid #ccc; padding-top: 20px; }

/* Post Comment */
#disqus_thread, #showhide-comment{margin-top:25px} #showhide-comment + .comments{display:none}
.dummy-comment{text-align:center}
.dummy-comment a, .comments .continue a, .comments .loadmore a{display:block;padding:18px 20px;border:1px solid #e94c39;border-radius:5px;font-size:13px;}
.dummy-comment a:hover, .comments .continue a:hover, .comments .loadmore a:hover{border-color:#989b9f}
.comments, .comments .comment-replybox-thread, .comments .comment-form{margin-top:25px;}
.comments p, .comments ol{margin:0;padding:0;list-style:none;-webkit-transition:all .2s ease-in;transition:all .2s ease-in;}
.comments .continue, .comments .loadmore{margin:20px auto;text-align:center}
.comments .loadmore.loaded{max-height:0;opacity:0;overflow:hidden}
.comments ol > li{list-style-type:none;position:relative;padding:20px;border-radius:10px;background:#fff;box-shadow:0 6px 18px 0 rgba(9,32,76,.075);}
.comments ol > li:not(:last-child){margin-bottom:15px;}
.comment .avatar-image-container{position:absolute;width:35px;height:35px;background:#f2f2f7 url("data:image/svg+xml,<svg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'><path d='M16,17a8,8,0,1,1,8-8A8,8,0,0,1,16,17ZM16,3a6,6,0,1,0,6,6A6,6,0,0,0,16,3Z' fill='rgba(0,0,0,.1)'/><path d='M23,31H9a5,5,0,0,1-5-5V22a1,1,0,0,1,.49-.86l5-3a1,1,0,0,1,1,1.72L6,22.57V26a3,3,0,0,0,3,3H23a3,3,0,0,0,3-3V22.57l-4.51-2.71a1,1,0,1,1,1-1.72l5,3A1,1,0,0,1,28,22v4A5,5,0,0,1,23,31Z' fill='rgba(0,0,0,.1)'/></svg>") center / 18px no-repeat;border-radius:50%;overflow:hidden}
.comment .comment-block{position:relative;}
.comment .comment-block .comment-header{display:flex;display:-webkit-flex;flex-wrap:wrap;-webkit-flex:wrap;align-items:flex-end;-webkit-align-items:flex-end;margin:0 0 15px 45px}
.comment .comment-block .comment-header .user span,.comment .comment-block .comment-header .user a{margin-right:5px;font-style:normal;font-weight:600;font-size:13px;color:#09204C;white-space:nowrap}
.comment .comment-block .comment-header .datetime{display:block;width:100%;color:#989b9f;margin-top:2px;font-size:10px;font-family:'Segoe UI', Roboto, san-serif}
.comment .comment-block .comment-header .datetime a, .comment .comment-footer .comment-timestamp a{color:#989b9f}
.comment .comment-block .comment-content{color:#4d4d4d}
.comment .comment-block .icon.blog-author{display:inline-block;vertical-align:top;width:22px;margin-right:5px}
.comment .comment-block .icon.blog-author:before{content:'';width:17px!important;height:17px;display:block;background:url("data:image/svg+xml,<svg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z' fill='%23519bd6'></path></svg>") center left / 16px no-repeat;}
.comment .comment-replybox-single > *{margin-top:15px}
.comment .comment-replies .inline-thread{padding-top:10px;margin-top:15px;border-top:1px solid rgba(0,0,0,.03)}
.comment .comment-replies .thread-toggle{display:flex;display:-webkit-flex;align-items:center;-webit-align-items:center;margin:0px 0 0 -3px;font-size:13px}
.comment .comment-replies .thread-toggle a{color:#989b9f}
.comment .comment-replies .thread-toggle .thread-count{margin:0 auto 0 2.5px}
.comment .comment-replies .thread-toggle .thread-arrow:before{content:'';display:block;position:relative;width:16px;height:16px;background:url("data:image/svg+xml,<svg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M256 294.1L383 167c9.4-9.4 24.6-9.4 33.9 0s9.3 24.6 0 34L273 345c-9.1 9.1-23.7 9.3-33.1.7L95 201.1c-4.7-4.7-7-10.9-7-17s2.3-12.3 7-17c9.4-9.4 24.6-9.4 33.9 0l127.1 127z' fill='%23989b9f'/></svg>") center / 12px no-repeat;-webkit-transition:all .2s ease-in;transition:all .2s ease-in;}
.comment .comment-replies .thread-collapsed .thread-arrow:before{transform:rotate(-90deg);-webkit-transform:rotate(-90deg);}
.comment .comment-replies ol{margin-top:15px}
.comment .comment-replies ol.thread-collapsed{display:none}
.comment .comment-actions{display:flex;display:-webkit-flex;align-items:center;-webkit-align-items:center;margin-top:10px;font-size:13px;}
.comment .comment-actions > *{display:block}
.comment .comment-actions a{color:#989b9f}
.comment .comment-actions .item-control:before{content:'\00b7';display:inline-block;margin:0 6px;color:#989b9f}
.comment .comment .avatar-image-container{width:30px;height:30px;}
.comment .comment .comment-block{margin-left:40px;margin-bottom:12px;padding:12px 15px 25px;background-color:#f1f1f0;border-radius:15px;overflow:hidden}
.comment .comment:last-child .comment-block{margin-bottom:0}
.comment .comment .comment-block .comment-header{display:flex;display:-webkit-flex;align-items:flex-end;-webkit-align-items:flex-end;margin:0 0 10px 0}
.comment .comment .comment-block .comment-header .datetime{display:block;align-self:center;-webkit-align-self:center;width:auto;position:relative;top:1px;margin:0 0 0 auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.comment .comment .comment-actions{display:block;position:absolute;bottom:0;right:0;margin:0;}
.comment .comment .comment-actions span:before{display:none}
.comment .comment .comment-actions a{display:block;background-color:rgba(0,0,0,.03);padding:5px 10px;font-size:11px;border-radius:15px 0 10px 0;color:#989b9f}
.comments .comment-thread .comment-replies .continue{margin:10px 0 0 45px}
.comments .comment-thread .comment-replies .continue a{color:#09204C;padding:0;border:0;text-align:left}
.comments .comment-thread .comment-replies .continue a:before{content:'';display:inline-block;position:relative;top:3px;margin-right:5px;width:14px;height:16px;background:url("data:image/svg+xml,<svg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M444.7 230.4l-141.1-132c-1.7-1.6-3.3-2.5-5.6-2.4-4.4.2-10 3.3-10 8v66.2c0 2-1.6 3.8-3.6 4.1C144.1 195.8 85 300.8 64.1 409.8c-.8 4.3 5 8.3 7.7 4.9 51.2-64.5 113.5-106.6 212-107.4 2.2 0 4.2 2.6 4.2 4.8v65c0 7 9.3 10.1 14.5 5.3l142.1-134.3c2.6-2.4 3.4-5.2 3.5-8.4-.1-3.2-.9-6.9-3.4-9.3z' fill='%2309204C'></path></svg>") center / 13px no-repeat;}
#comment-editor-src, .comments .comment-form h4{display:none;}.avatar-image-container img { width: 100%; height: 100%; }
li.comment { padding: 17px 13px; border-bottom: 1px dashed #cccccc4d; }
.job-explain { flex: auto; } .job-feedback-container { padding: 20px; border-top: 15px solid #fafafb; } .success-box { } .success-box img { margin-right:10px; display:inline-block; vertical-align:top; } .success-box > div { vertical-align:top; display:inline-block; color:#888; } .feedback-main textarea { width: 100%; border: 1px solid #e6e6e6; background: #f8f8f87a; border-radius: 3px; padding: 10px; } .feedback-main input[type="submit"] { border: navajowhite; padding: 7px 15px; border-radius: 5px; background: #2196F3; color: #fff; font-weight: 600; position: relative; float: right; } /* Rating Star Widgets Style */ .rating-stars ul { list-style-type:none; padding:0; -moz-user-select:none; -webkit-user-select:none; } .rating-stars ul > li.star { display:inline-block; } /* Idle State of the stars */ .rating-stars ul > li.star > i.fa { font-size:2.5em; /* Change the size of the stars */ color:#ccc; /* Color on idle state */ } /* Hover state of the stars */ .rating-stars ul > li.star.hover > i.fa { color:#FFCC36; } /* Selected state of the stars */ .rating-stars ul > li.star.selected > i.fa { color:#FF912C; }
</style>
