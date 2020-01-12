import 'package:flutter/material.dart';
import 'service_locator.dart';
import './widgets/connected_button.dart';
void main() {
  setupLocator();
  runApp(MyApp());
}
class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        title: 'Flutter Demo',
        theme: ThemeData(
          primarySwatch: Colors.blue,
        ),
        home: Scaffold(
            backgroundColor: Colors.grey[800],
            body: Column(
              mainAxisSize: MainAxisSize.max,
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: <Widget>[
                ConnectedButton(id: 0),
                ConnectedButton(id: 1),
                ConnectedButton(id: 2),
                ConnectedButton(id: 1)
              ],
            )));
  }
}