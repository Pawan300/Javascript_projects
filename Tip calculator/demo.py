from flask import Flask
from flask import render_template

app = Flask(__name__, template_folder='templates')

@app.route('/')
def index():
    return render_template('tip.html') 

if __name__ == '__main__':
    app.run(host="0.0.0.0", debug = True)