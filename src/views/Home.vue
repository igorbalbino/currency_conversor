
<template>
  <v-app class="appHome" id="home">
    <NavToolBar />
    <v-container class="paddinToolBar">
      <v-row>
        <v-col class="py-0">
          <v-fade-transition mode="out-in">
            <router-view />
          </v-fade-transition>
        </v-col>
      </v-row>
    </v-container>
    <div class="paddinGeneral">
      <h2>Porque usamos moeda estatal ?<br /></h2>
      <h5>Sugerido e escrito por Pepe D'Ambrosio, Revisado por Paulo Almeida, Narrado por Rafael Dufra e Produzido por Henrique L. <br />Disponível em: https://visaolibertaria.com/article/282edd57-7d24-431b-add1-9dc26cb51be6<br /><br /></h5>
      <h5>This is Libertarian View, your source of decentralized and distributed information.<br /></h5>
      <p>   Com a evolução da civilização, passou a existir excedente na produção. A partir desse excedente, ocorreram as primeiras relações de troca. Primeiramente, elas ocorriam por escambo – isto é, a troca de mercadorias sem um bem intermediário. Essa relação é muito comum em tribos e em povos primitivos. Um exemplo muito claro de escambo é a troca de figurinhas para completar os álbuns da Copa do Mundo. 
          Uma figurinha repetida para você terá, logicamente, um valor maior para uma pessoa que não a tenha. Assim, ocorre a relação de escambo.<br /><br />
          Por razões óbvias, o escambo não é a maneira mais prática de se realizar trocas. Nem sempre o bem ofertado era desejado pela outra parte. Para resolver esse problema, foi adotado um recurso de interesse comum: a moeda. Ela funciona como uma espécie de “coringa”, pois, teoricamente, qualquer material pode ser utilizado como moeda. No entanto, nem todos possuem o mesmo valor. Evidentemente, recursos muito abundantes, como o níquel ou o papel, não são mecanismos de troca tão eficientes, pois seria necessária uma enorme quantidade deles para praticar alguma transação significativa. 
          Seguindo a Lei da Oferta e da Demanda, não é possível que algo extremamente banal, como um pedaço de papel, tenha valor relevante no livre mercado. Então, por que utilizamos o dinheiro estatal, uma vez que ele não é tão valoroso?<br /><br />
          Essa não é uma pergunta muito difícil de responder. Segundo Rothbard no livro “O que o governo fez com o nosso dinheiro?”, o Estado não poderia implementar sua moeda desvalorizada de maneira repentina. Caso o fizesse, pouquíssimas pessoas aceitariam esse novo dinheiro emitido. Portanto, essa violência contra o livre mercado foi feita de maneira sutil e gradual. Nessa época, as commodities metálicas eram as principais moedas em circulação. O ouro e a prata eram recursos raros e dificilmente inflacionáveis. Por isso, era muito maior o desafio do Estado para controlar a economia. 
          No entanto, a máfia estatal tomou para si o monopólio absoluto da cunhagem. Agora, toda moeda circulante deveria estar com um selo, um símbolo que o Leviatã escolheu. Por causa desse monopólio, foi possível cobrar impostos diretamente na fundição da moeda. Além disso, os Estados tinham agora o poder de não aceitar moedas estrangeiras, porque a riqueza não era mais medida pelo ouro, mas sim pela moeda estatal local.<br /><br />
          Com isso, chegamos à Lei de Gresham. Thomas Gresham foi um comerciante inglês que propôs o seguinte: quando há disputa entre duas moedas no mercado, a moeda artificialmente sobrevalorizada tende a tirar a moeda artificialmente subvalorizada do mercado. Isso ocorre, logicamente, por intervenção estatal. Imagine uma sociedade que utilize exclusivamente o ouro como mecanismo de troca, mas o monarca decide que a população deva utilizar a moeda da Coroa. Para isso, ele proíbe a circulação de ouro em seu território e impõe o curso do seu dinheiro.  
          Embora o ouro seja mais valorizado que a moeda do monarca, ele foi artificialmente desvalorizado pela sua proibição. Aliás, por que alguém teria algo que não pode utilizar? Nesse sentido, a moeda de curso forçado toma o lugar do ouro no mercado.<br /><br />
          Inicialmente, ainda foi mantido o chamado padrão-ouro, o que era uma relação de quanto a moeda estatal representava em ouro. No entanto, ele não foi capaz de frear o ímpeto estatal de inflacionar mais e mais a moeda. Com o controle do curso de dinheiro, o Leviatã pôde expandir seus tentáculos e dominar toda a sociedade. O poder de imprimir papel moeda deu ao Estado a força necessária para subjugar toda a população. As medidas assistencialistas, os serviços públicos, gratuitos e de qualidade e o aumento desenfreado no número de funcionários públicos não poderiam mais ser sustentados apenas pela tributação direta. 
          Era necessário criar mais dinheiro falso para sustentar demandas falsas. Com o passar do tempo, a inflação tornou-se corriqueira e natural. O Estado tinha conseguido o controle quase que absoluto da economia.<br /><br />
          Diante desse cenário, você deve estar se perguntando, “mas por que o Bitcoin ainda circula?”. Bom, esse caso é diferente. O Bitcoin possui um sistema descentralizado e é uma moeda digital. Dessa forma, não é tão fácil impedir a sua circulação, já que o sistema Blockchain não tem uma sede em si. É por causa disso que o establishment está totalmente desesperado. Frequentemente, economistas mainstream e políticos estão criticando as criptomoedas, como se elas fossem “maus investimentos”. O Bitcoin, assim como as outras criptomoedas, é uma reserva de valor! 
          Serve para que as pessoas não percam a sua riqueza por causa da canetada de algum político parasita. A verdade é que o povo está cansado desse dinheiro de papel que está sempre sendo inflacionado pelos parasitas do Estado. Os estados nacionais estão, aos poucos, perdendo o controle da economia e a tendência é que o livre mercado de moedas substitua as moedas fiduciárias estatais no médio-longo prazo. Graças à inovação tecnológica, há esperanças de um futuro livre do Leviatã.<br /><br />
          Thank you for your audience. This article was  Sugerido e escrito por Pepe D'Ambrosio, Revisado por Paulo Almeida, Narrado por Rafael Dufra e Produzido por Henrique L
      </p>
      <h5>Sugerido e escrito por Pepe D'Ambrosio, Revisado por Paulo Almeida, Narrado por Rafael Dufra e Produzido por Henrique L. <br />Disponível em: https://visaolibertaria.com/article/282edd57-7d24-431b-add1-9dc26cb51be6<br /><br /></h5>
    </div>
  </v-app>
</template>

<script>
import Vue from 'vue'
import router from 'vue-router'
import NavToolBar from '../components/NavToolBar'

// @ is an alias to /src
export default {
  name: 'Home',
  components: {
    NavToolBar
  }
}

const app = new Vue({
  router
}).$mount('#home')

console.log(app);
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h3 {
    margin: 40px 0 0;
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  li {
    display: inline-block;
    margin: 0 10px;
  }
</style>