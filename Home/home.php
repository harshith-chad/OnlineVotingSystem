<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital voting</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
       
        .navbar{
            padding-right: 50px;
            display: flex;
            flex-direction: row;
            height:100px;
            width: 100%;
            align-items: center;
            gap:220px;
            background-color: rgb(247, 242, 239);  
            position: fixed;
            top:0;
            left: 0;
            z-index: 9999;
        }
        

        
        .titletop>img{
            cursor: pointer;
            position:relative;
            width: 185px;
            padding-left: 100px; 

        }

        .detail{
            display:flex;
            flex-direction: row;
            gap:80px;
        }
        .detail>li{
            list-style: none;
        }

        .detail>li>a{
            
            text-decoration: none;
           
            font-size: 20px;
            color: rgb(11, 13, 80);
            font-weight:bold;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        }
        .searchbox input{
            font-size: 20px;
            border-radius: 6px;
            width: 200px;
            height:35px;
            padding-left: 40px;
            border-color: rgb(87, 87, 106);
        }
        .searchbox>img{
            position: absolute;
            height:25px;
            padding:6px 6px;
        }
        
        .image2>img{
            width:auto;
            height: 398px;
        }
       .image4>img{
        height:401px;
        width: auto;
        
       
       }
       .image1>img{
        width: auto;
        height: 397px;
       }
        .hpimg{
            background: url('https://ggapartners.com/wp-content/uploads/post/taking-club-elections-digital-with-online-voting/16909/2021/03/OnlineVotingInfoSheet_web_featured-img.svg') no-repeat center center/cover;
            height:636px;
            position:relative;
        }
        .title{
            text-align: center;
            padding: 50px 50px;
            color: rgb(3, 3, 68);
            font-size: 30px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .maindetail{
            display: flex;
            flex-direction: column;
          
        }
     .part1,.part2,.part3,.part4{
        display:flex;
        flex-direction:row;
        margin:80px 30px;

     }
     .hpimg{
        margin-top: 107px !important;
     }
     .detail1>h2{
      text-align: center;
      color: rgb(3, 3, 68);
      font-size: 30px;
      font-weight: 500;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;


     }
     .detail1>p{
        font-weight: 200;
      padding-top: 15px;
      font-size: 20px;
      color: rgb(3, 3, 68);
      margin:20px 90px;
      line-height: 30px;
      word-spacing: 2px;
      font-family: 'Times New Roman', Times, serif;
     }
.services{
    display: flex;
    flex-direction: column;
    /* border: 1px solid rgb(1, 1, 40); */
    background-color: rgb(247, 242, 239);
  
}
.upperservices{
display:flex;
flex-direction: row;
}
.lowerservices{
    display:flex;
flex-direction: row;
padding-bottom: 120px;
}
.servicepart{
    display:flex;
    flex-direction: column;

}
.servicepart>img{
    width: 110px;
    height: auto;
    padding-left: 120px;
    
}

.servicetitle>h3{
    margin-top: 50px;
    text-align: center;
    font-size: 35px;
    color: rgb(1, 1, 40);
}
.servicepart{
    margin:50px 50px;
}

/* .upperservices>.servicepart{
    margin:50px 50px ;
    margin-bottom: 80px;

} */
  .servicepart>h2{
    padding-left: 9px;
    font-size: 25px;
    text-align: center;
    color: rgb(1, 1, 40);
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }  
  .servicepart>p{
    margin:10px 10px;
    font-size: 19px;
    color: rgb(1, 1, 40);
    font-weight: 500;
  }
 #none1{
    width: 400px;
 }
 #none2{
    width: 400px;
} 
 #img3,#img6{
    padding-left: 140px;
}
.contact{
    
    width: 100%;
    height: 600px;
    background: url('https://st.depositphotos.com/1291951/2496/i/450/depositphotos_24960671-stock-photo-dark-blue-background.jpg');
    background-size: cover;
    position: relative;
    color: white;
    opacity: 0.95;
    text-align: center;
}
.item>h4{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    padding-top: 60px;
    font-size: 30px;
    padding-bottom: 10px;
}
 .item>h3{
    font-size: 90px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
 }
 .but>button{
    width: 330px;
    height: 110px;
    border-radius: 45px;
    font-size: 40px;
    margin-top: 50px;
    color: rgb(67, 62, 62);
    background-color: rgb(247, 242, 239) ;
 }
 button:hover{
    scale:1.1;
    cursor: pointer;
    color: rgb(2, 2, 65);
 }
 .copy{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 90px;
    font-size: 20px;
    color: rgb(3, 3, 74);
    background-color:  rgb(247, 242, 239);
 }

 /* @media only screen and (max-width:600px){
    .navbar{
        display:flex;
    flex-direction: column;}
 } */
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="titletop">
          <img src="../images/evote-logo.png" alt=""> 
        </div>
        
        <ul class="detail">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="../voter/Voter_login.php">Voter</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <div class="searchbox">
            <img src="data:image/png;base64,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" alt="">
        <input type="text" name="search"  placeholder="Search here">
        </div>
       </nav>
       <section class="hpimg"> 
        
       </section>
        
        
       <section class="hpmain2">
        <div class="title">
            <h3>About E-voting</h3>
        </div>
        <div class="maindetail">
            <div class="part1">
                <div class="image1">
                     <img src="https://media.istockphoto.com/id/1283508299/photo/online-voting-hologram-ballot-and-internet-voting-box-in-laptop-mixed-environment-e-voting.jpg?s=612x612&w=0&k=20&c=T1LprGS-_xgd4ErjA1YhCwqF_bC2NVcdhRkAv5kr5CI=" alt=""> 
                </div>
                <div class="detail1">
            <h2>Vote Online From Anywhere</h2>
            <p>e-Voting is voting through an electronic system on resolutions of company requiring members/shareholder’s consent. The need for e-Voting arises when a company wishes to pass a resolution by Postal Ballot or Annual General Meeting or Extraordinary General Meeting.Electronic voting (also known as e-voting) is voting that uses electronic means to either aid or take care of casting and counting ballots. Depending on the particular implementation, e-voting may use standalone electronic voting machines (also called EVM) or computers connected to the Internet (online voting)</p>
                </div>
            </div>
            <div class="part2">
                <div class="detail1">
            <h2>Digital Voting As Emerging Technology</h2>
            <p>Digital voting (also known as web voting) refers to systems which make use of digital technologies, specifically the internet, to allow people to vote in an election and to have their votes counted online. Digital voting, where votes are cast online, should not be confused with voting machines, which are pieces of hardware which are not connected to the internet.</p>
                </div>
                <div class="image2">
                    <img src="https://t4.ftcdn.net/jpg/03/89/61/95/240_F_389619531_zndlO6JzP3SBQh7k4cpszcZoTz9uhkaX.jpg" alt=""> 
                </div>
            </div>
            <div class="part3">
            <div class="image3">
            <img src="https://www.section.io/engineering-education/blockchain-as-a-form-of-e-voting/hero.jpg" alt=""> 
            </div>
            <div class="detail1">
             <h2>BlockChain In E-Voting</h2>
            <p>Blockchain technology offers a decentralized node for online voting or electronic voting. Recently distributed ledger technologies such blockchain were used to produce electronic voting systems mainly because of their end-to-end verification advantages [13]. Blockchain is an appealing alternative to conventional electronic voting systems with features such as decentralization, non-repudiation, and security protection.</p>
            </div>
            </div>
            <div class="part4">  
            <div class="detail1">
            <h2>Digital Voting As Secure</h2>
            <p>secure voting is understood to be about methods, software and systems that aim to protect an election from fraud and disruption. It a question of correctness and integrity. A voting system is secure in the sense that we can trust that the results of an election are fair and correct. The main threats faced by a secure voting system are those typical of any computer security problem: hacking, intrusion, manipulation, disruption. </p>
            </div>
            <div class="image4">
                <img src="https://images.techhive.com/images/article/2016/10/election_2016_teaser_20_electronic_voting_evoting_security_digital_election_data-100685708-large.jpg?auto=webp&quality=85,70" alt="">
            </div>
            </div>
        </div>
       </section> 
       <section class="services">
        <div class="servicetitle">
            <h3>Our Services</h3>
        </div>
        <div class="upperservices">
<div class="servicepart">
    <img src="https://www.polyas.com/sites/default/files/premium.png" alt="no image">
    <h2>One person,one vote</h2>
    <p>"one person, one vote", expresses the principle of equal representation in voting.</p>
</div>
<div class="servicepart">
    <img src="https://www.polyas.com/sites/default/files/authentifizierung.png" alt="">
    <h2>Secure Voter Authentication</h2>
    <p>Voter authentication is one of the most important elements of an online voting system</p>

</div>
<div class="servicepart">
    <img id="img3" src="https://www.polyas.com/sites/default/files/Sicher%20.png" alt="">
    <h2>Secure Data Protection</h2>
    <p id="none1">the proposed online Electronic voting system, voters data, Candidates data, votes triggered by voters are stored in encrypted database called CryptDB.</p>
</div>
        </div>
        <div class="lowerservices">
<div class="servicepart">
    <img src="https://www.polyas.com/sites/default/files/u%CC%88berpru%CC%88fung_wahl_1.png" alt="">
    <h2>Verify Election Results</h2>
    <p>Search your name in the voter list of your state. This service is provided by the Election Commission of India.</p>
</div>
<div class="servicepart">
    <img src="https://www.polyas.com/sites/default/files/Cybersicherheit_0.png" alt="">
    <h2>Provide Security System</h2>
    <p>Most online voting systems claim to be secure referring to cybersecurity and resistance to cyberattacks.</p>

</div>
<div class="servicepart">
    <img id="img6"  src="https://www.polyas.com/sites/default/files/Wahlgeheimnis_0.png" alt="">
     <h2>Ensure the secrecy of ballot</h2>
     <p id="none2"> A secret ballot provides anonymity for the electorate, thereby preventing or at least minimizing the influence third parties can have over the electorate. </p>
</div>
        </div>
       </section>

       <div class="contact">
        <div class="item">
        <h4>Get In Touch</h4>
        <h3>Get Your Right Solution,</h3>
        <h3>Contact Now With Us</h3>
        </div>
        <div class="but">
        <button>Contact Us</button>
        </div>
    </div>
    <div class="copy">
        <h4>&copy;Copyright E_Voting 2023 - All Rights reserved</h4>
    </div>
</body>
</html>