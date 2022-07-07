import 'package:atresnapowersoft/screens/auth/login_screens.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Atresna Power Soft',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const LoginScreens(),
    );
  }
}
