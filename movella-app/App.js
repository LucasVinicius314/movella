import 'react-native-gesture-handler'
import React from 'react'
import { NavigationContainer } from '@react-navigation/native'
import { createStackNavigator } from '@react-navigation/stack'
import { DefaultTheme, Provider } from 'react-native-paper'

const theme = {
  ...DefaultTheme,
  roundness: 2,
  colors: {
    ...DefaultTheme.colors,
    primary: '#eb3c33',
    accent: '#f1c40f',
  },
}

import Auth from './src/Auth'
import Root from './src/Root'

const Stack = createStackNavigator()

export default class App extends React.Component {
  render = () => (
    <Provider theme={theme}>
      <NavigationContainer>
        <Stack.Navigator initialRouteName='Auth' screenOptions={{ headerLeft: () => null }}>
          <Stack.Screen name='Auth' component={Auth} options={{ title: 'Login', headerShown: true }} />
          <Stack.Screen name='Root' component={Root} options={{ headerShown: false }} />
        </Stack.Navigator>
      </NavigationContainer>
    </Provider>
  )
}
