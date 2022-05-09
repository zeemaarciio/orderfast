$(document).ready(function(){

    var tamanho_linkSobre_original = $('.btn_mLateral_sobre .mLateral_maisLinks').height();
    var tamanho_linkdonoRes_original = $('.btn_mLateral_donoRes .mLateral_maisLinks').height();
    $('.btn_mLateral_sobre .mLateral_maisLinks').css('height','0px');
    $('.btn_mLateral_donoRes .mLateral_maisLinks').css('height','0px');
    
    /*
        || Botão abrir menu laterial
    */ 

    $('.conteudoMenuB').fadeIn(0);
    
    $('.menuB_toopo').click(function(){
        $('.conteudoMenuB').animate({
            right: '0px',
        });
    });
    
    $('.menuB_toopo').fadeIn(0);
    
    
    /*
        || Botão fechar menu laterial
    */
    
    $('.btnFecharMenuB').click(function(){
        $('.conteudoMenuB').animate({
            right: '-1000px',
        });
        var mLateral_maisLinks_verif = $('.mLateral_maisLinks').height();
        if ('.mLateral_maisLinks' || '0' ) {
            $('.mLateral_maisLinks').animate({
                height: '0px'
            }, 200).fadeOut(0);
        }
    });
    
    /*
        || Menu links
    */

    $('.btn_mLateral_sobre .mLateral_maisLinks ul').css({
        position: 'relative',
        top:'20px',
        opacity: '0'
    });
    $('.btn_mLateral_donoRes .mLateral_maisLinks ul').css({
        position: 'relative',
        top:'20px',
        opacity: '0'
    });

        /* Link Sobre */
    $('.btn_mLateral_sobre').click(function(){
        var tamanho_linkSobre_vificadado = $('.btn_mLateral_sobre .mLateral_maisLinks').height();
        if(tamanho_linkSobre_vificadado == '0'){
            $('.btn_mLateral_sobre .mLateral_maisLinks').fadeIn(0).animate({
                height: tamanho_linkSobre_original,
            }, 200);

            $('.btn_mLateral_sobre .mLateral_maisLinks ul').fadeIn(0).animate({
                opacity: '1',
                top: '0px',
            });

            if (tamanho_linkdonoRes_original || '0') {
                $('.btn_mLateral_donoRes .mLateral_maisLinks').animate({
                    height: '0px'
                }, 200).fadeOut(0);

                $('.btn_mLateral_donoRes .mLateral_maisLinks ul').animate({
                top: '20px',
                    opacity: '0'
                }).fadeOut(0);
            }

        }else{
            $('.btn_mLateral_sobre .mLateral_maisLinks').animate({
                height: '0px',
            }, 200).fadeOut(0);
            $('.btn_mLateral_sobre .mLateral_maisLinks ul').animate({
                top: '20px',
                opacity: '0'
            }).fadeOut(0);
        }
    });
    
    
    /* btn Dono Restalrante */
    $('.btn_mLateral_donoRes').click(function(){
        var tamanho_linkdonoRes_vificadado = $('.btn_mLateral_donoRes .mLateral_maisLinks').height();
        if(tamanho_linkdonoRes_vificadado == '0'){
            $('.btn_mLateral_donoRes .mLateral_maisLinks').fadeIn(0).animate({
                height: tamanho_linkdonoRes_original,
            }, 200);

            $('.btn_mLateral_donoRes .mLateral_maisLinks ul').fadeIn(0).animate({
                opacity: '1',
                top: '0px',
            });

            if (tamanho_linkSobre_original || '0') {
                $('.btn_mLateral_sobre .mLateral_maisLinks').animate({
                    height: '0px'
                }, 200).fadeOut(0);

                $('.btn_mLateral_sobre .mLateral_maisLinks ul').animate({
                top: '20px',
                    opacity: '0'
                }).fadeOut(0);
            }
        }else{
            $('.btn_mLateral_donoRes .mLateral_maisLinks').animate({
                height: '0px',
            }, 200).fadeOut(0);

            $('.btn_mLateral_donoRes .mLateral_maisLinks ul').animate({
                top: '20px',
                opacity: '0'
            }).fadeOut(0);
        }
    });
});