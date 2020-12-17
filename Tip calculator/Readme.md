### In this folder we are creating a calculator which helps us to calculate tips given to the waiter.

I used multiple ways to deploy this within localhost:
* I used Flask to deploy it in the localhost server.
  - python demo.py
  Then go to http://127.0.0.1:5000 for the demo.
* Used Docker to create an image to deploy.
  - docker build --tag app . [Don't forget this (.) in the end]
  - docker run --name app -p 5000:5000 app
  Then go to http://127.0.0.1:5000 for the demo.


