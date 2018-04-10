# apiAndroidMyEvent
Api php permétant la gestion des événements 

##Liste des URL 
- Connexion des utilisateur


        http://X.X.X.X/apiAndroidMyEvent/connexion_user.php?email=demo&mdp=demo
    
- Lister les évenments


        http://X.X.X.X/apiAndroidMyEvent/liste_evenement.php
        
- Voir mes évenement 
    
    
        http://X.X.X.X/apiAndroidMyEvent/voir_mes_evenement.php?id_user=1
  
        
- Particpation à un event
    
    
        http://X.X.X.X/apiAndroidMyEvent/update_mes_evenement.php?id_user=%221%22&particpation=participe&id_event=1
        
- Ne plus participer à un évenement
        
        
        http://X.X.X.X/apiAndroidMyEvent/update_mes_evenement.php?id_user="1"&particpation=non_participe&id_event=1

