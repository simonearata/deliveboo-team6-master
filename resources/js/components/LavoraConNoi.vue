<template>
    <section class="lavora_con_noi">
        <div class="container">
            <h1>Lavora con Deliveboo</h1>

            <div class="row">
              <div class="col-xs-12 col-md-4">
                <div class="banner_verticale gray">
                  <img  src="/img/riders-homepage.jpg" alt="">
                  <h2>Rider</h2>
                  <p>Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</p>
                  <button type="button" name="button" class="bn632-hover bn26">Unisciti a noi</button>
                </div>
              </div>

                <div class="col-xs-12 col-md-4">
                  <div class="banner_verticale red">
                    <img src="/img/restaurantss.jpg" class="img-red" alt="">
                    <h2>Ristoranti</h2>
                    <p>Diventa partner di Deliveboo e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.</p>
                    <button type="button" name="button" class="bn633-hover bn27">Diventa nostro partner</button>
                  </div>
                </div>

                <div class="col-xs-12 col-md-4">
                  <div class="banner_verticale orange">
                    <img src="/img/team.jpg" class="img-orange" alt="">
                    <h2>Lavora con noi</h2>
                    <p>La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.</p>
                    <button type="button" name="button" class="bn634-hover bn28">Scopri di più</button>
                  </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>


.lavora_con_noi {

    width: 100%;
    h1 {
        font-size: 40px;
        padding-bottom: 30px;
        padding-top: 40px;
        font-weight: bold;
        color: #2E3333;
    }

    .banner_verticale{
        color: white;
        height: 530px;
        width: 350px;
        /* margin-bottom: 50px; */
        margin-right: 5px;

        img {
            width: 100%;
            -webkit-clip-path: polygon(0 0, 100% 0%, 100% 80%, 0% 100%);
                    clip-path: polygon(0 0, 100% 0%, 100% 80%, 0% 120%);
        }

        h2 {
            font-size: 40px;
            font-weight: bold;
            padding: 5px 25px;
        }

        p {
            font-size: 15px;
            padding: 0 25px;
        }

        /* button {
            color: white;
            padding: 12px 24px;
            margin-top: 15px;
            font-size: 20px;
            background-color: #00ccbc;
            border-radius: 5px;
            border: none;
            font-size: 15px;
            margin: 20px 20px;
            &:hover {
                background-color: #00bbad;
            }
        } */


    }
}

.red {
  background-color: #ff483b;
    img.img-red{
        -webkit-clip-path: polygon(0 0, 100% 0%, 100% 80%, 0% 100%);
          clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 68%);
    }
}

.orange {
  background-color: #ff8100;
  img.img-orange{
      -webkit-clip-path: polygon(0 0, 100% 0%, 100% 80%, 0% 100%);
                    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 87%);
  }
}

.gray {
  /* background-color: #bac3c3; */
  background-color: #7eb2d4
}

.bn632-hover {
  color: #fff;
  padding: 12px 24px;
  /* width: 160px; */
  /* font-size: 16px; */
  /* font-weight: 400; */
  font-size: 15px;
  margin-top:15px;
  cursor: pointer;
  /* margin: 20px; */
  margin: 20px 20px;

  /* height: 55px; */

  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 5px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:focus {
  outline: none;
}

.bn632-hover.bn26 {
    background-image: linear-gradient(
      to right,
      #25aae1,
      #4481eb,
      #04befe,
      #3f86ed
    );
    box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
  }


  /* --- */

  .bn633-hover {
  color: #fff;
  padding: 12px 24px;
  /* width: 160px; */
  /* font-size: 16px; */
  /* font-weight: 400; */
  font-size: 15px;
  margin-top:15px;
  cursor: pointer;
  /* margin: 20px; */
  margin: 20px 20px;

  /* height: 55px; */

  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 5px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn633-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn633-hover:focus {
  outline: none;
}

.bn633-hover.bn27 {
    background-image: linear-gradient(
      to right,
      #a00909,
      #D62E24,
      #FF6938,
      #C80000
    );
    box-shadow: 0 4px 15px 0 rgba(211, 24, 24, 0.705);
  }

  /* ---- */

    .bn634-hover {
  color: #fff;
  padding: 12px 24px;
  /* width: 160px; */
  /* font-size: 16px; */
  /* font-weight: 400; */
  font-size: 15px;
  margin-top:15px;
  cursor: pointer;
  /* margin: 20px; */
  margin: 20px 20px;

  /* height: 55px; */

  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 5px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn634-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn634-hover:focus {
  outline: none;
}

.bn634-hover.bn28 {
    background-image: linear-gradient(
      to right,
      #ff4800,
      #f37928,
      #fcec09dc,
      #ffaf38

    );
    box-shadow: 0 4px 15px 0 rgba(238, 223, 9, 0.705);
  }

</style>