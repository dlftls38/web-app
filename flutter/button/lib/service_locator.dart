import 'package:get_it/get_it.dart';
import './services/button_message_bus.dart';
GetIt locator = GetIt();
void setupLocator() {
  locator.registerSingleton(ButtonMessagebus());
}