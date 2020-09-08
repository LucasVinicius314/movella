
import 'react-native-gesture-handler'
import React from 'react'
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs'
import { AntDesign } from '@expo/vector-icons'
import { Feather } from '@expo/vector-icons'

import Home from './Home'
import Find from './Find'
import Settings from './Settings'

const Tab = createBottomTabNavigator()

export default class Root extends React.Component {
  render = () => (
    <>
      <Tab.Navigator
        screenOptions={({ route }) => ({
          tabBarIcon: ({ focused, color, size }) => {

            if (route.name === 'Home') return <AntDesign name="home" size={24} color={focused ? 'black' : 'gray'} />

            if (route.name === 'Find') return <AntDesign name="search1" size={24} color={focused ? 'black' : 'gray'} />

            if (route.name === 'Settings') return <Feather name="settings" size={24} color={focused ? 'black' : 'gray'} />

          }
        })}
        tabBarOptions={{
          activeTintColor: '#eb3c33',
          inactiveTintColor: 'gray',
        }}
      >
        <Tab.Screen name="Home" component={Home} />
        <Tab.Screen name="Find" component={Find} />
        <Tab.Screen name="Settings" component={Settings} />
      </Tab.Navigator>
    </>
  )
}
