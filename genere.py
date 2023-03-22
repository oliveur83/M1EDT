import mysql.connector
import random
# test sur les salle et prof 


# récupérer les événements existants qui ont lieu pendant la période de temps spécifiée

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="m1_edt"
)
# select ue
mycursor = mydb.cursor()
mycursor.execute("SELECT code_ue FROM ue ")
result = mycursor.fetchall()
code_ue=[]
for row in result:
  code_ue+=[row[0]]
# select user
mycursor.execute("SELECT id_user FROM user ")
result = mycursor.fetchall()
user=[]
for row in result:
  user+=[row[0]]
# select groupe 
mycursor.execute("SELECT code_groupe FROM groupe ")
result = mycursor.fetchall()
groupe=[]
for row in result:
  groupe+=[row[0]]

# variable 
salle=[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
id_ev=82
code_ue_nbr=0
jours=0
heure=0
i=200
while i<220:
    heure = random.randint(10, 18)
    jour = random.randint(6,10)
    if jour<10:
      jour=f"0{jour}"
    code_ue_nbr = random.randint(0,len(code_ue)-1)
    salle_nbr = random.randint(0,len(salle)-1)
    user_nbr = random.randint(0,len(user)-1)
    groupe_nbr = random.randint(0,len(groupe)-1)
    nouvelle_date_debut=f"'2023-03-{jour}T{heure}:00:00'"
    nouvelle_date_fin=f"'2023-03-{jour}T{heure+2}:00:00'"
    # for a chevauchement 
    mycursor.execute(f'''SELECT * FROM evenement 
inner join evenement_user_liaison 
on evenement.id_evenement=evenement_user_liaison.id_evenement
inner join evenement_groupe_liaison
on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
    WHERE (date_debut_evenement <= {nouvelle_date_debut}
    AND date_fin_evenement >= {nouvelle_date_debut}) OR (date_debut_evenement >= {nouvelle_date_debut} 
    AND date_fin_evenement <= {nouvelle_date_fin}) OR (date_debut_evenement <= {nouvelle_date_fin} 
    AND date_fin_evenement >= {nouvelle_date_fin}) 
    AND id_salle = {salle[salle_nbr]}
    AND code_groupe='{groupe[groupe_nbr]}'
    AND id_user= {user[user_nbr]} ''')
    
    resultats = mycursor.fetchall()
    if not resultats:
      print("dacoord")
      a=f'''INSERT INTO `evenement` (`id_evenement`, `titre_evenement`, `categorie_evenement`, `date_debut_evenement`, `date_fin_evenement`, `couleur_evenement`, `remarques_evenement`, `code_ue`, `id_salle`)
        VALUES ({i}, 'event{i}', 'CM', '2023-03-{jour}T{heure}:00:00', '2023-03-{jour}T{heure+2}:00:00', 'ff8040', NULL, '{code_ue[code_ue_nbr]}', {salle[salle_nbr]});
  '''
      b=f'''INSERT INTO `evenement_user_liaison` (`id_evenement`, `id_user`)
        VALUES ({i}, {user[user_nbr]});
  '''
      c=f'''
  INSERT INTO `evenement_groupe_liaison` (`id_evenement`, `code_groupe`)
  VALUES ({i}, '{groupe[groupe_nbr]}');

  '''
      mycursor.execute(a)
      mycursor.execute(b)
      mycursor.execute(c)
      mydb.commit()
      i=i+1
    elif  resultats==True:
      print("tototo")
    
mycursor.close()



