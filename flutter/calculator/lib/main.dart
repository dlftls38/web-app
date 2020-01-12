import 'package:flutter/material.dart';

void main() => runApp(XylophoneApp());

class XylophoneApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        backgroundColor: Colors.white,
        body: SafeArea(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: <Widget>[
              SizedBox(
                width: 80.0,
                height: 80.0,
              ),
              Image(
                width: 120.0,
                height: 120.0,
                image: AssetImage('images/calculator.png'),
              ),
              SizedBox(
                width: 80.0,
                height: 80.0,
              ),
              Text(
                'Calculator',
                textAlign: TextAlign.center,
                overflow: TextOverflow.ellipsis,
                style: TextStyle(
                  color: Colors.purple,
                  fontSize: 20.0,
                ),
              ),
              SizedBox(
                width: 80.0,
                height: 80.0,
              ),
              Container(
                margin: const EdgeInsets.symmetric(horizontal: 20.0),
                child: TextFormField(
                  decoration: const InputDecoration(
                    icon: Icon(Icons.person),
                    hintText: 'Input your ID',
                    labelText: 'ID',
                  ),
                  onSaved: (String value) {
                    // This optional block of code can be used to run
                    // code when the user saves the form.
                  },
                  validator: (String value) {
                    //return value.contains('@') ? 'Do not use the @ char.' : null;
                  },
                ),
              ),
              SizedBox(
                width: 20.0,
                height: 20.0,
              ),
              Container(
                margin: const EdgeInsets.symmetric(horizontal: 20.0),
                child: TextFormField(
                  decoration: const InputDecoration(
                    icon: Icon(Icons.lock),
                    hintText: 'Input your password',
                    labelText: 'Password',
                  ),
                  onSaved: (String value) {
                    // This optional block of code can be used to run
                    // code when the user saves the form.
                  },
                  validator: (String value) {
                    //return value.contains('@') ? 'Do not use the @ char.' : null;
                  },
                ),
              ),
              Builder(
                builder: (context) => Center(
                  child: RaisedButton(
                    child: Text("Foo"),
                    onPressed: () => Navigator.pushNamed(context, "/"),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class SecondRoute extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold();
  }
}
