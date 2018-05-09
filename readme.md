# Project 4
+ By: Jae Yong Chong
+ Production URL: <http://p4.jaechong.me>

## CSCI E15 - Project 4
## Database
* This is simple menu ordering system which can be expanded further to effectively communicate between customers, servers and chefs.*
* There are three tables, the main table is order table that keeps customer orders.  This order list can further used to keep track of orders. *
* Customers create orders from plates an drinks tables.  Just to have different relationship, I chose to have plates and orders one to many and drinks orders many to many relationships.  Thus there is one pivot table between orders and drinks. *

Primary tables:
  + `orders`
  + `plates`
  + `drinks`
  
Pivot table(s):
  + `drink_order`

## CRUD
*Describe what action I need take in order to see an example of all 4 CRUD operations in your app. I've filled this out with examples from the Foobooks app - delete this and replace with your own info. If one operation is performed multiple times (e.g. Read), you only need to provide 1 example.*

__Create__
  + Visit <http://p4.jaechong.me/orders/create>
  + Fill out form
  + Click *Add order*
  + Observe confirmation message
  
__Read__
  + Visit <http://p4.jaechong.me/orders> see a listing of all orders
  
__Update__
  + Visit <http://p4.jaechong.me/orders>; choose the Edit button below one of the orders
  + Make some edit to form
  + Click *Save changes*
  + Observe confirmation message
  
__Delete__
  + Visit <http://p4.jaechong.me/orders>; choose the Delete button below one of the orders
  + Confirm deletion
  + Observe confirmation message

## Outside resources
*Mostly used foobook example: https://github.com/susanBuck/foobooks*
*Logo image: https://www.google.ca/search?q=transparent+restaurant+logo+images&rlz=1C5CHFA_enCA761CA761&tbm=isch&tbo=u&source=univ&sa=X&ved=0ahUKEwjOisi95fnaAhUB2IMKHUwpBpQQsAQIKA&biw=1280&bih=882#imgrc=znvg6fCQX2OAYM:*
*Not much time for more thorough app and did not really have to use much outside resources other than foobooks and lecture videos*

## Notes for instructor
*This contains bare minimum requirements for the project.  I plan on expanding for my friend who just opened up his own restaurant.*
