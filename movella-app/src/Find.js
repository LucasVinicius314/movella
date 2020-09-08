

import 'react-native-gesture-handler'
import React from 'react'
import { StatusBar } from 'expo-status-bar'
import {
  StyleSheet,
  Text,
  View,
} from 'react-native'

export default class Finds extends React.Component {
  render = () => (
    <>
      <StatusBar style="auto" />
      <View style={styles.container}>
        <Text>Find</Text>
      </View>
    </>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
})
