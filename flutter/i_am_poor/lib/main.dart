import 'package:flutter/material.dart';

void main() {
  runApp(
    MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.orange[300],
          title: Text('I am Groot'),
        ),
        body: Center(
          child: Image(
            image: AssetImage('images/icons8-groot-240.png'),
          ),
        ),
      ),
    ),
  );
}
