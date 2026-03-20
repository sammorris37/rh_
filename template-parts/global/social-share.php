<style>
.social-share {
    display:flex;
    align-items:center;
    justify-content:center;
    flex-wrap:wrap;
    gap:0 var(--gutter-s);
    width:100%;
    border-style: solid;
    border-width: 1px;
    border-image: linear-gradient(90deg, rgba(0,0,0,0) 15%, rgba(237, 237, 237,1) 15%, rgba(237, 237, 237,1) 85%, rgba(0,0,0,0) 85%)
                100% 0 100% 0/1px 0 1px 0 stretch;
}

.social-share .share {
    margin:0;
}

.social-icon {
    cursor:pointer;
}

.social-icon:hover {
    transform:scale(1.05);
}

.social-icon svg {
    width:1.4rem;
    height:auto;
    pointer-events:none;
    display:block;
}
</style>

<div class="social-share padding-block-s margin-block-l">
    <p class="small share center-t">Share:</p>
    <a class="social-icon" id="facebook-share" title="Facebook">
        <?php get_template_part('assets/icons/icon-facebook'); ?>
    </a>
    <a class="social-icon" id="twitter-share" title="X / Twitter">
        <?php get_template_part('assets/icons/icon-twitter'); ?>
    </a>
    <a class="social-icon" id="linkedin-share" title="LinkedIn">
        <?php get_template_part('assets/icons/icon-linkedin'); ?>
    </a>
    <a class="social-icon" id="whatsapp-share" title="WhatsApp">
        <?php get_template_part('assets/icons/icon-whatsapp'); ?>
    </a>
    <a class="social-icon" id="email-share" title="Mail">
        <?php get_template_part('assets/icons/icon-mail'); ?>
    </a>
</div>