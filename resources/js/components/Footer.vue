<template>
<footer>
    <div class="container">
        <div class="box-container">
            <div class="box-footer">
                <h5> Scopri Deliveroo</h5>
                <ul>
                    <li>
                        <a href="#">Investitori</a>
                    </li>
                    <li>
                        <a href="#">Chi siamo</a>
                    </li>
                    <li>
                        <a href="#">Ristoranti</a>
                    </li>
                    <li>
                        <a href="#">Altro</a>
                    </li>
                    <li>
                        <a href="#">Pressroom</a>
                    </li>
                    <li>
                        <a href="#">Il nostro blog</a>
                    </li>
                    <li>
                        <a href="#">Programmazione</a>
                    </li>
                    <li>
                        <a href="#">Design</a>
                    </li>
                    <li>
                        <a href="#">Lavora con noi</a>
                    </li>
                    <li>
                        <a href="#">Diventa nostro partner</a>
                    </li>
                </ul>
            </div>

            <div class="box-footer">
                <h5>Web Developer</h5>
                <ul>
                    <li>
                        <a href="https://www.linkedin.com/in/gabriela-isabella-nita-63aa07216/">Isabella Nita</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/pietro-visconti-704014216/">Pietro Visconti</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/fabrizio-rozzi-8797a81b8/">Fabrizio Rozzi</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/simone-arata/">Simone Arata</a>
                    </li>
                </ul>
            </div>

            <div class="box-footer">
                <h5> Note legali</h5>
                <ul>
                    <li>
                        <a href="#">Termini e condizioni</a>
                    </li>
                    <li>
                        <a href="#">Informativa sulla privacy</a>
                    </li>
                    <li>
                        <a href="#">Cookies</a>
                    </li>
                </ul>
            </div>


            <div class="box-footer">
                <h5>Porta Deliveroo con te</h5>
                <div class="app-store">
                    <a href="https://apps.apple.com/it/app/deliveroo-consegne-di-cibo/id1001501844"><i id="icon-apple" class="fab fa-apple"></i> App store</a>

                </div>
                <div class="google-store">
                    <a href="https://play.google.com/store/apps/details?id=com.deliveroo.orderapp&hl=it&gl=US"><i id="icon-google" class="fab fa-google-play"></i> Google Play</a>

                </div>

            </div>

        </div>

        <div class="nav-icon">
            <div class="box-icon">
                <ul class="social-links">

                    <li class="facebook">
                    <a href="https://www.facebook.com/DeliverooIT/?brand_redir=298497216936972">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    </li>

                    <li class="twitter">
                    <a href="https://twitter.com/deliveroo_italy?lang=it">
                        <i class="fab fa-twitter"></i>
                    </a>
                    </li>

                    <li class="instagram" >
                    <a href="https://www.instagram.com/deliveroo_italy/?hl=it">
                        <i class="fab fa-instagram"></i>
                    </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</footer>



</template>

<style lang='scss' scoped>

    footer{
  background-color: #007E8A;
  margin-top: 20px;
  padding: 20px 60px;

  .box-container{

      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;

      .box-footer{
          width: 250px;
          height: auto;
          background-color: #00C2B3;
          padding: 20px;
          margin: 10px;
          color: #fff;
          border-radius: 5px;

          h5{
              font-weight: bold;
          }

          ul{
              list-style-type: none;
              padding-left: 0;

              li{

                  a{
                      text-decoration: none;
                      color: #fff;

                      &:hover{
                          color: #007E8A;
                      }
                  }
              }
          }
      }

      .app-store, .google-store{
          display: block;
          background-color: black;
          border: 1px solid #fff;
          border-radius: 5px;
          margin: 10px;
          text-align: center;

          &:hover a{
              color: #00a396;
              cursor:pointer;
          }

          a{
              color: #fff;
              text-decoration: none;
              font-size: 18px;
              padding: 10px;
              display: block;

              #icon-apple, #icon-google{
                  font-size: 30px;
                  margin-right: 5px;
              }
          }
      }
  }

    .nav-icon{
        width: 40%;
        margin: 0 auto;
            .box-icon{
                width: 40%;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                    .social-links {
                        transition: 0.2s ease-in-out;
                        position: relative;
                        list-style: none;
                        display: flex;
                        height: 90px;
                        width: 180px;
                        align-items: center;
                        margin-left: 0px;
                        padding-left:20px;
                        padding-right:20px;
                    }
                    .social-links:hover > li {
                    transform: scale(0.95);
                    filter: blur(2px);
                    }
                    .social-links li {
                        transition: 0.2s ease-in-out;
                        border-radius: 10px;
                        place-items: center;
                        cursor: pointer;
                        display: grid;
                        margin: auto;
                        height: 33px;
                        width: 33px;
                    }
                    .social-links li:hover {
                    filter: blur(0px);
                    transform: scale(1);
                    }
            }


            .social-links li.facebook {
            background-color: #3f51b5;

                a i{
                    transition: 0.2s ease-in-out;
                    pointer-events: none;
                    font-size: 20px;
                    color: white;
                }
            }

            .social-links li.twitter {
            background-color: #03a9f4;

                a i{
                transition: 0.2s ease-in-out;
                pointer-events: none;
                font-size: 20px;
                color: white;
                }
            }

            .social-links li.instagram {
            background-color: #FD3E8B;

                a i{
                    transition: 0.2s ease-in-out;
                    pointer-events: none;
                    font-size: 20px;
                    color: white;
                }
            }

    }

}

</style>