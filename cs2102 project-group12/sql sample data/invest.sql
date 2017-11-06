--create investments--
INSERT INTO invest VALUES('heyimsam@gmail.com', 'Retirement fund', 'oldguy88@gmail.com',
30);
UPDATE project SET raised = (SELECT SUM(amount) FROM invest WHERE creator
='oldguy88@gmail.com' AND project_name= 'Retirement fund' ) WHERE creator
='oldguy88@gmail.com' AND project_name= 'Retirement fund' ;
INSERT INTO invest VALUES('susantan99@hotmail.com', 'Charity Performance',
'rencicharityfund@gmail.com', 50);
UPDATE project SET raised = ( SELECT SUM(amount) FROM invest WHERE creator
='rencicharityfund@gmail.com' AND project_name= 'Charity Performance') WHERE creator
='rencicharityfund@gmail.com' AND project_name= 'Charity Performance';
INSERT INTO invest VALUES('goodmorning@gmail.com', 'Making Potato Salad',
'bruceli@hotmail.com', 5);
UPDATE project SET raised = ( SELECT SUM(amount) FROM invest WHERE creator
='bruceli@hotmail.com' AND project_name= 'Making Potato Salad' ) WHERE creator
='bruceli@hotmail.com' AND project_name= 'Making Potato Salad';
INSERT INTO invest VALUES('leekonghee@gmail.com', 'Retirement fund', 'oldguy88@gmail.com',
45);
UPDATE project SET raised =( SELECT SUM(amount) FROM invest WHERE creator
='oldguy88@gmail.com' AND project_name= 'Retirement fund') WHERE creator
='oldguy88@gmail.com' AND project_name= 'Retirement fund';
INSERT INTO invest VALUES('wangwang@hotmail.com', 'BBQ party', 'heyimsam@gmail.com', 60);
UPDATE project SET raised = ( SELECT SUM(amount) FROM invest WHERE creator
='heyimsam@gmail.com' AND project_name= 'BBQ party' ) WHERE creator
='heyimsam@gmail.com' AND project_name= 'BBQ party';