import 'react-native-gesture-handler'
import React from 'react'
import { StatusBar } from 'expo-status-bar'
import { List } from 'react-native-paper'
import { MaterialIcons } from '@expo/vector-icons'
import {
  StyleSheet,
  Text,
  View,
} from 'react-native'

export default class Settings extends React.Component {
  render = () => (
    <>
      <StatusBar style="auto" />
      <View style={styles.container}>
        <List.Section>
          <List.Subheader>Info</List.Subheader>
          <List.Item title="John Doe" left={() => <List.Icon color="#000" icon="worker" />} />
          <List.Item title="Mechanical engineer, works at SpaceX" left={() => <List.Icon color="#000" icon="check" />} />
          <List.Item title="Discord#0000" left={() => <List.Icon color="#000" icon="discord" />} />
          <List.Item title="April 4th, 2020" left={() => <List.Icon color="#000" icon="calendar" />} />
        </List.Section>
      </View>
    </>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    paddingVertical: 20,
  },
})
